<?php

namespace App\Models;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class BlogContent extends Model
{
    use HasFactory;

    protected $table = 'blog_contents';

    protected $fillable = ['blog_title', 'blog_description'];

    public static function getFullData($data)
    {
        $value =  SELF::select('blog_title', 'blog_description','id')->get();

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('blogs-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('blogs-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new BlogContent;
        $value->blog_title             = $data->blog_title;
        $value->blog_description       = $data->blog_description;

        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = BlogContent::find($data->blog_id);
        $value->blog_title             = $data->blog_title;
        $value->blog_description       = $data->blog_description;

        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first(['blog_title', 'blog_description','id']);
    }

    public static function getCount(){
        return SELF::count();
    }
}
