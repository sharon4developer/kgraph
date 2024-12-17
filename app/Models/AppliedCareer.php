<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class AppliedCareer extends Model
{
    use HasFactory;

    protected $table = 'applied_careers';

    protected $fillable = ['email','name','country_code','mobile','branch','department','message','resume','career_id'];

    public function Branch(){
        return  $this->belongsTo(CareerBranch::class,'branch')->withTrashed();
    }

    public function Career(){
        return  $this->belongsTo(Career::class,'career_id')->withTrashed();
    }

    public function Department(){
        return  $this->belongsTo(CareerDepartment::class,'department')->withTrashed();
    }

    public static function getFullData()
    {
        $locationData = getLocationData();

        $value =  SELF::with(['Branch:id,title','Department:id,title'])->select('email', 'id', 'created_at','name','country_code','mobile','branch','department','message','resume','career_id')->orderBy('created_at', 'desc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->editColumn('branch', function ($row) {
                return $row->branch ? $row->Branch->title : '';
            })
            ->editColumn('career_id', function ($row) {

                return $row->career_id ? $row->Career->title : '';
            })
            ->editColumn('department', function ($row) {
                return $row->department ? $row->Department->title : '';
            })
            ->editColumn('resume', function ($row) use($locationData) {
                return isset($row->resume) ? $locationData['storage_server_path'].$locationData['storage_image_path'].$row->resume : NULL;
            })
            ->editColumn('message', function ($row) use($locationData) {
                return isset($row->message) ?  $locationData['storage_server_path'].$locationData['storage_image_path'].$row->message : NULL;
            })
            ->make(true);
    }

    public static function saveCareer($data)
    {
        $value = new AppliedCareer;
        $value->name = $data->name;
        $value->email = $data->email;
        $value->country_code = $data->country;
        $value->mobile = $data->mobile;
        $value->branch = $data->branch;
        $value->department = $data->department;
        // $value->message = $data->message;

        if ($data->resume) {
            $value->resume = Cms::storeImage($data->resume, $data->name);
        };

        if ($data->message) {
            $value->message = Cms::storeImage($data->message, $data->name);
        };

        return $value->save();
    }

    public static function saveCareerNew($data)
    {
        $value = new AppliedCareer;
        $value->name = $data->name_n;
        $value->email = $data->email_n;
        $value->country_code = $data->country_n;
        $value->career_id = $data->job_id;
        $value->mobile = $data->mobile_n;
        $value->branch = $data->branch_n;
        $value->department = $data->department_n;
        // $value->message = $data->message_n;

        if ($data->resume_n) {
            $value->resume = Cms::storeImage($data->resume_n, $data->name_n);
        };

        if ($data->message_n) {
            $value->message = Cms::storeImage($data->message_n, $data->name_n);
        };

        return $value->save();
    }
}
