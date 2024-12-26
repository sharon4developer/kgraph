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

    public static function getFullData()
    {
        $value =  SELF::select('email', 'id', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
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
