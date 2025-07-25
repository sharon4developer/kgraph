<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'testimonials';

    protected $fillable = ['title', 'name','place','occupation','image','description','status','intervention_image','order', 'rating','alt_tag'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title', 'name','id','description','status','place','occupation','image','created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
        ->editColumn('image', function ($row) use ($locationData) {
            if ($row->image) {
                return '<img src="' . $locationData['storage_server_path'] . $locationData['storage_image_path'] . $row->image . '" class="table-img" alt="Image">';
            } else {
                $initial = strtoupper(substr($row->name, 0, 1));
                return '<div style="width: 4rem; height: 4rem; border-radius: 50%; background-color: #6B7280; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.125rem; font-weight: 600;">'
                . $initial .
                '</div>';}
        })
        ->addColumn('can_delete', function ($row) {
            return Gate::allows('testimonials-delete');
        })
        ->addColumn('can_edit', function ($row) {
            return Gate::allows('testimonials-edit'); })
        ->addIndexColumn()
        ->rawColumns(['action', 'edit', 'delete','image'])
        ->make(true);
    }

    public static function createData($data)
    {
        $value = new Testimonial;
        $value->title        = $data->title;
        $value->name        = $data->name;
        $value->place  = $data->place;
        $value->occupation  = $data->occupation;
        $value->description  = $data->description;
        $value->rating  = $data->rating;
        $value->alt_tag           =  $data->alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = Testimonial::find($data->testimonial_id);

        $value->name        = $data->name;
        $value->place  = $data->place;
        $value->occupation  = $data->occupation;
        $value->description  = $data->description;
        $value->rating  = $data->rating;
        $value->alt_tag           =  $data->alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        return $value->save();
    }

    public static function changeStatus($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->status = $value->status == 1 ? 0 : 1;
            $value->save();
            return true;
        } else
            return false;
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

    public static function getFullDataForHome(){
        return SELF::select('title', 'name','place','occupation','image','description','status','intervention_image','id', 'rating','alt_tag')->orderBy('order','asc')->where('status',1)->get();
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
