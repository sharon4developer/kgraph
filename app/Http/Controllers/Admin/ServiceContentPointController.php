<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceContentPointRequest;
use App\Http\Requests\Admin\UpdateServiceContentPointRequest;
use App\Models\ServiceContentPoint;
use App\Models\ServicePoint;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceContentPointController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(Gate::allows('service-points'), 403);

        $title = 'Service Point Content';
        $sub_title = 'Service Point Content';

        $services = ServiceContentPoint::getFullDataForHome();

        if ($request->service_point_content_id) {
            $service_point_content_id = $request->service_point_content_id;
            $data = ServiceContentPoint::where('id', $service_point_content_id)
                ->with('Title.options.subOptions', 'Title.paragraphs')
                ->first();

            // if (!$data) {
            //     abort(404);
            // }
        } else {
            abort(404);
        }

        return view('admin.sub-service-content-points.index', compact('title', 'sub_title', 'service_point_content_id', 'data'));
    }

    public function store(StoreServiceContentPointRequest $request)
    {
        abort_unless(Gate::allows('service-points-create'), 403);

        try {
            $save = ServiceContentPoint::createPointData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/service-content-options',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($response);
    }
}
