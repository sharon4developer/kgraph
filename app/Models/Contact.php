<?php

namespace App\Models;

use App\Mail\ContactMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['email','name','country_code','mobile','message','order'];

    public static function getFullData()
    {
        $value =  SELF::select('email', 'id', 'created_at','name','country_code','mobile','message')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->make(true);
    }

    public static function saveContact($data)
    {
        $value = new Contact;
        $value->name = $data->name;
        $value->email = $data->email;
        $value->country_code = $data->country;
        $value->mobile = $data->mobile;
        $value->message = $data->message;
        $value->save();

        $contactData = [
            'name' => $data->name,
            'email' => $data->email,
            'mobile' => $data->country .' '. $data->mobile,
            'message' => $data->message,
        ];

        // Send the email
        Mail::to($data->email)->send(new ContactMessage($contactData));

        return true;
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
