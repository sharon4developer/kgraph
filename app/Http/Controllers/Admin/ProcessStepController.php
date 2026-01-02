<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProcessStepRequest;
use App\Http\Requests\Admin\UpdateProcessStepRequest;
use App\Models\Service;
use App\Models\ProcessStep;
use Exception;
use Illuminate\Http\Request;

class ProcessStepController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('process-steps'), 403);
        $title = 'Process Steps';
        $sub_title = 'Process Steps';

        $services = Service::getFullDataForHome();

        return view('admin.process-steps.index', compact('title', 'sub_title', 'services'));
    }

    public function create()
    {
        abort_unless(Gate::allows('process-steps-create'), 403);
        $title = 'Process Steps';
        $sub_title = 'Add';

        $services = Service::getFullDataForHome();

        return view('admin.process-steps.create', compact('title', 'sub_title', 'services'));
    }

    public function store(StoreProcessStepRequest $request)
    {
        abort_unless(Gate::allows('process-steps-create'), 403);
        try {
            // Handle checkbox values
            $request->merge([
                'status' => $request->has('status') ? 1 : 0,
                'is_default' => $request->has('is_default') ? 1 : 0,
                'service_id' => $request->service_id ?: null,
            ]);
            
            $save = ProcessStep::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => url('admin/process-steps'),
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
        abort_unless(Gate::allows('process-steps'), 403);
        $data = ProcessStep::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('process-steps-edit'), 403);
        $data = ProcessStep::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Process Steps';
        $sub_title = 'Edit';

        $services = Service::getFullDataForHome();

        return view('admin.process-steps.edit', compact('data', 'title', 'sub_title', 'services'));
    }

    public function update(UpdateProcessStepRequest $request, $id)
    {
        abort_unless(Gate::allows('process-steps-edit'), 403);
        try {
            // Handle checkbox values
            $request->merge([
                'status' => $request->has('status') ? 1 : 0,
                'is_default' => $request->has('is_default') ? 1 : 0,
                'service_id' => $request->service_id ?: null,
                'process_step_id' => $id,
            ]);
            
            $save = ProcessStep::updateData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => url('admin/process-steps'),
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

    public function destroy($id)
    {
        abort_unless(Gate::allows('process-steps-delete'), 403);
        $request = new Request(['id' => $id]);
        $delete = ProcessStep::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = ProcessStep::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        ProcessStep::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
