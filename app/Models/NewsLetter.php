<?php

namespace App\Models;

use App\Mail\NewsLetterSubscribed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class NewsLetter extends Model
{
    use HasFactory;

    protected $table = 'news_letters';

    protected $fillable = ['email','order'];

    public static function getFullData($request)
    {
        $value =  SELF::select('email', 'id', 'created_at')->orderBy('order', 'asc');

        if ($request->has('from_date') && $request->filled('from_date')) {
            $value->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->filled('to_date')) {
            $value->whereDate('created_at', '<=', $request->input('to_date'));
        }

        return DataTables::of($value)

            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d H:i:s',strtotime($row->created_at));
            })
            ->make(true);
    }

    public static function saveNewsLetter($data)
    {
        Mail::to($data->news_letter_email)->send(new NewsLetterSubscribed($data->news_letter_email));
        $value = new NewsLetter;
        $value->email = $data->news_letter_email;
        return $value->save();
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
