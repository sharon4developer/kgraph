<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = ['title','url','main_role','parent_id','submenu_count','status'];

    public static function getFullData(){

        $value =  SELF::select('title','id','status');

        return DataTables::of($value)
        ->addColumn('can_delete', function ($row) {
            return Gate::allows('pages-delete');
        })
        ->addColumn('can_edit', function ($row) {
            return Gate::allows('pages-edit'); })
        ->addIndexColumn()
        ->rawColumns(['action', 'edit', 'delete'])
        ->make(true);
	}

    public function Seo(){
        return  $this->hasOne(Seo::class);
    }

    public static function getData($id){
        return SELF::find($id);
    }
    public static function updateData($data){

        $value = Page::find($data->page_id);
        $value->title         = $data->title;
        return $value->save();
    }
    public static function changeStatus($data){

        $value = SELF::find($data->id);
         if($value){
             $value->status = $value->status == 1 ? 0 : 1;
             $value->save();
             return true;
         }
         else
             return false;
    }
    public static function getSeoDetails($url){
        $locationData = getLocationData();
        $data = SELF::where('url',$url)->with('Seo')->first('id');
        if($data && $data['Seo'])
            $data['Seo']->og_image = $locationData['storage_server_path'].$locationData['storage_image_path'].$data['Seo']->og_image;
        return $data;
    }
}
