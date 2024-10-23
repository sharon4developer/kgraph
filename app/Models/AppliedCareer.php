<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class AppliedCareer extends Model
{
    use HasFactory;

    protected $table = 'applied_careers';

    protected $fillable = ['email','name','country_code','mobile','branch','department','message','resume'];

    public function Branch(){
        return  $this->belongsTo(CareerBranch::class,'branch')->withTrashed();
    }

    public function Department(){
        return  $this->belongsTo(CareerDepartment::class,'department')->withTrashed();
    }

    public static function getFullData()
    {
        $locationData = getLocationData();

        $value =  SELF::with(['Branch:id,title','Department:id,title'])->select('email', 'id', 'created_at','name','country_code','mobile','branch','department','message','resume')->orderBy('created_at', 'desc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->editColumn('branch', function ($row) {
                return $row->Branch->title;
            })
            ->editColumn('department', function ($row) {
                return $row->Department->title;
            })
            ->editColumn('resume', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->resume;
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
        $value->message = $data->message;

        if ($data->resume) {
            $value->resume = Cms::storeImage($data->resume, $data->name);
        };

        return $value->save();
    }
}
