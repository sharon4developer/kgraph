<?php

namespace App\Models;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['email','name','country_code','mobile','message','order'];

    public static function getFullData($request)
    {
        $value =  SELF::select('email', 'id', 'created_at','name','country_code','mobile','message')->orderBy('order', 'asc');
        if ($request->has('from_date') && $request->filled('from_date')) {
            $value->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->filled('to_date')) {
            $value->whereDate('created_at', '<=', $request->input('to_date'));
        }

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d H:i:s',strtotime($row->created_at));
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('contact-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('contact-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
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
        $email = whatsApp::first('email');

        if(isset($email) && isset($email->email)){
         
            Mail::to($email->email)->send(new ContactMessage($contactData));
        }
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
