<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'packages';

    protected $fillable = ['country', 'description', 'image', 'intervention_image', 'status','order','title'];

    public function PackagePoint(){
        return  $this->hasMany(PackagePoint::class);
    }

    public function PackageFaq(){
        return  $this->hasMany(PackageFaq::class);
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('country', 'image', 'id', 'status', 'created_at','title')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Package;
        $value->title        = $data->title;
        $value->country        = $data->country;
        $value->description  = $data->description;
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
        return SELF::with(['PackagePoint','PackageFaq'])->find($id);
    }

    public static function updateData($data)
    {
        $value = Package::find($data->package_id);
        $value->title        = $data->title;
        $value->country        = $data->country;
        $value->description  = $data->description;
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
        return SELF::select('image','id','country','description','title')->orderBy('order','asc')->where('status',1)->get();
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
