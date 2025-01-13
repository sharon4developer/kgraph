<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServicePointContentPointsRequest;
use App\Http\Requests\Admin\UpdateServicePointContentPointsRequest;
use App\Models\ServicePointContentPoints;
use App\Models\SubServicePointContent;
use Exception;
use Illuminate\Http\Request;

class ServicePointContentPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_unless(Gate::allows('service-point-content'), 403);

        $title = 'Sub Service Point Content';
        $sub_title = 'Sub Service Point Content';

        $services = SubServicePointContent::getFullDataForHome();

        if ($request->service_point_content_id) {
            $service_point_content_id = $request->service_point_content_id;
            $data = SubServicePointContent::where('id', $service_point_content_id)
            ->with('Title.options.subOptions', 'Title.paragraphs')
            ->first();
            if (!$data) {
                abort(404);
            }

        } else {
            abort(404);
        }

        return view('admin.sub-service-point-content-points.index',compact('title','sub_title','services','service_point_content_id','data'));
    }

    public function create()
    {
        abort_unless(Gate::allows('service-point-content-create'), 403);
        $title = 'Sub Service Point Content';
        $sub_title = 'Add';

        $services = SubServicePointContent::getFullDataForHome();

        return view('admin.sub-service-point-content-points.create',compact('title','sub_title','services'));
    }

    public function store(StoreServicePointContentPointsRequest $request)
    {
        abort_unless(Gate::allows('service-point-content-create'), 403);
        try{
            $save= ServicePointContentPoints::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-point-contents',
                ];
            }else{
                $response=[
                    'status'=>false,
                    'message'=>'Something wrong please try again.',
                ];
            }

        }catch(Exception $e){
            $response=[
                'status'=>false,
                'message'=>'Something went wrong please try again.',
                'error'=>$e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function show(Request $request)
    {
        abort_unless(Gate::allows('service-point-content'), 403);
        $data = ServicePointContentPoints::getFullData($request);
        return $data;
    }

    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('service-point-content-delete'), 403);
        $delete = ServicePointContentPoints::deleteData($request);
        $data = SubServicePointContent::getData($request->service_point_content_id);
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        ServicePointContentPoints::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
