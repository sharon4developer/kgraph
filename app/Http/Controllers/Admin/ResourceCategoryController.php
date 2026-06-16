<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResourceCategoryRequest;
use App\Http\Requests\Admin\UpdateResourceCategoryRequest;
use App\Models\ResourceCategory;
use Exception;
use Illuminate\Http\Request;

class ResourceCategoryController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('resource-categories'), 403);
        $userCanDelete = Gate::allows('resource-categories-delete');
        $title = 'Resource Categories';
        $sub_title = 'Resource Categories';

        return view('admin.resource-categories.index', compact('title', 'sub_title', 'userCanDelete'));
    }

    public function create()
    {
        abort_unless(Gate::allows('resource-categories-create'), 403);
        $title = 'Resource Categories';
        $sub_title = 'Add';
        return view('admin.resource-categories.create', compact('title', 'sub_title'));
    }

    public function store(StoreResourceCategoryRequest $request)
    {
        abort_unless(Gate::allows('resource-categories-create'), 403);
        try {
            $save = ResourceCategory::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/resource-categories',
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
        abort_unless(Gate::allows('resource-categories'), 403);
        $data = ResourceCategory::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('resource-categories-edit'), 403);
        $data = ResourceCategory::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Resource Categories';
        $sub_title = 'Edit';
        return view('admin.resource-categories.edit', compact('data', 'title', 'sub_title'));
    }

    public function update(UpdateResourceCategoryRequest $request, $id)
    {
        abort_unless(Gate::allows('resource-categories-edit'), 403);
        try {
            $save = ResourceCategory::updateData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/resource-categories',
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
        abort_unless(Gate::allows('resource-categories-delete'), 403);

        $delete = ResourceCategory::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = ResourceCategory::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        ResourceCategory::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
