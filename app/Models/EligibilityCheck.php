<?php

namespace App\Models;

use App\Mail\EligibilityCheckMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class EligibilityCheck extends Model
{
    use HasFactory;

    protected $table = 'eligibility_checks';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'street_address',
        'city',
        'state',
        'zip',
        'country_live',
        'country_born',
        'mobile',
        'dob',
        'marital_status',
        'have_children',
        'hear_about_canada',
        'type_of_application',
        'further_info',
        'funds_available',
        'highest_education_outside_can',
        'country_of_studies',
        'highest_education_inside_can',
        'language_level_english',
        'english_language_test',
        'language_level_french',
        'french_language_test',
        'resume',
        'main_industry',
        'work_exp_outside_can',
        'work_exp_inside_can',
        'entitled_to_work',
        'manage_business',
        'temporary_foreign_worker',
        'certificate_of_qualification',
        'job_offer',
        'family_relations_in_canada',
        'refused_or_cancelled_visa',
        'refused_admission',
        'refused_admission_border',
        'partner_been_to_canada',
        'overstayed_in_any_country',
        'partner_previously_applied_for_visa',
        'partner_previously_submitted_an_application',
        'criminal_record',
        'arrested',
        'detained',
        'nomination_certificate',
        'language_test',
        'speaking',
        'reading',
        'listening',
        'writing',
        'order'
    ];

    // Method to get all eligibility check data
    public static function getData($request)
    {

        $value = self::select(
            'first_name',
            'last_name',
            'email',
            'mobile',
            'id',
            'created_at'
        )->orderBy('order', 'asc');

        if ($request->has('from_date') && $request->filled('from_date')) {
            $startDate = $request->input('to_date') . ' 00:00:00';
            $value->whereDate('created_at', '>=', $startDate);
        }

        // Apply the to_date filter if provided
        if ($request->has('to_date') && $request->filled('to_date')) {
            $toDate = $request->input('to_date') . ' 23:59:59';
            $value->whereDate('created_at', '<=', $toDate);
        }

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d H:i:s', strtotime($row->created_at));
            })

            ->make(true);
    }

    public static function createData($data)
    {
        $value = new EligibilityCheck;
        $value->fill($data->only($value->getFillable()));

        if ($data->resume) {
            $value->resume = Cms::storeImage($data->resume, $data->first_name . '_' . $data->last_name);
        }

        $eligibilityData = $data->toArray();

        Mail::to($data->email)->send(new EligibilityCheckMail($eligibilityData));

        return $value->save();
    }

    public static function getFullData($id)
    {
        $data = self::find($id);

        $locationData = getLocationData();


        $data->resume = $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->resume;

        return $data;
    }

    public static function deleteData($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->delete();
            return true;
        } else
            return false;
    }

    public static function updateOrder($data)
    {
        foreach ($data->order as $key => $value) {
            $step = SELF::find($value['id']);
            if ($step) {
                $step->order = $key;
                $step->save();
            }
        }
        return true;
    }
}
