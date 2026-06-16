<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ResourceContent extends Model
{
    use HasFactory;

    protected $table = 'resource_contents';

    protected $fillable = ['resource_title', 'resource_description'];

    public static function getFullData($data)
    {
        $value = SELF::select('resource_title', 'resource_description', 'id')->get();

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('resources-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('resources-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ResourceContent;
        $value->resource_title = $data->resource_title;
        $value->resource_description = $data->resource_description;

        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = ResourceContent::find($data->resource_content_id);
        $value->resource_title = $data->resource_title;
        $value->resource_description = $data->resource_description;

        return $value->save();
    }

    public static function getFullDataForHome()
    {
        return SELF::first(['resource_title', 'resource_description', 'id']);
    }

    public static function getCount()
    {
        return SELF::count();
    }
}
