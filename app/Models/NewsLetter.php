<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class NewsLetter extends Model
{
    use HasFactory;

    protected $table = 'news_letters';

    protected $fillable = ['email'];

    public static function getFullData()
    {
        $value =  SELF::select('email', 'id', 'created_at')->orderBy('created_at', 'desc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->make(true);
    }

    public static function saveNewsLetter($data)
    {
        $value = new NewsLetter;
        $value->email = $data->news_letter_email;
        return $value->save();
    }
}
