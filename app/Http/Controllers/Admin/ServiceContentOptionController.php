<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceContentOptions;
use App\Models\ServiceContentPoint;
use App\Models\ServicePoint;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceContentOptionController extends Controller
{
    public function index()
    {

        abort_unless(Gate::allows('service-points'), 403);
        $title = 'Service Point Content';
        $sub_title = 'Service Point Content';

        $services = Service::getFullDataForHome();

        return view('admin.service-content-options.index', compact('title', 'sub_title', 'services'));
    }

    public function create()
    {

        abort_unless(Gate::allows('service-points'), 403);
        $title = 'Service Point Content';
        $sub_title = 'Add';

        $services = ServicePoint::getFullDataForHome();

        return view('admin.service-content-options.create', compact('title', 'sub_title', 'services'));
    }

    public function store(Request $request)
    {
        abort_unless(Gate::allows('service-points-create'), 403);
        try {
            $save = ServiceContentPoint::createData($request);

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
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function show(Request $request)
    {

        abort_unless(Gate::allows('service-points'), 403);
        $data = ServiceContentPoint::getFullData($request);
        return $data;
    }

    public function edit($id)
    {

        abort_unless(Gate::allows('service-points-edit'), 403);
        $data = ServiceContentPoint::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Service Point Content';
        $sub_title = 'Edit';

        $services = ServicePoint::getFullDataForHome();

        return view('admin.service-content-options.edit', compact('data', 'title', 'sub_title', 'services'));
    }

    public function update(Request $request, $id)
    {

        abort_unless(Gate::allows('service-points-edit'), 403);
        try {
            $save = ServiceContentPoint::updateData($request);

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
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function destroy(Request $request)
    {

        abort_unless(Gate::allows('service-points-delete'), 403);
        $delete = ServiceContentPoint::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = ServiceContentPoint::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        ServiceContentPoint::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }

    public function getSubServicePoints(Request $request)
    {
        $serviceId = $request->input('service_id');

        // Fetch sub-service points for the selected service
        $subServicePoints = ServicePoint::where('service_id', $serviceId)->get();

        // Return the data as JSON
        return response()->json($subServicePoints);
    }
}
