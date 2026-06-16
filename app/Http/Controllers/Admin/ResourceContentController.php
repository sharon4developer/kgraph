<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResourceContentRequest;
use App\Http\Requests\Admin\UpdateResourceContentRequest;
use App\Models\ResourceContent;
use Exception;
use Illuminate\Http\Request;

class ResourceContentController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('resource-contents'), 403);
        $title = 'Resource Content';
        $sub_title = 'Resource Content';

        $count = ResourceContent::getCount();

        return view('admin.resource-content.index', compact('title', 'sub_title', 'count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('resource-contents-create'), 403);
        $title = 'Resource Content';
        $sub_title = 'Add';

        return view('admin.resource-content.create', compact('title', 'sub_title'));
    }

    public function store(StoreResourceContentRequest $request)
    {
        abort_unless(Gate::allows('resource-contents-create'), 403);
        try {
            $save = ResourceContent::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/resource-contents',
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
        abort_unless(Gate::allows('resource-contents'), 403);
        $data = ResourceContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('resource-contents-edit'), 403);
        $data = ResourceContent::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Resource Content';
        $sub_title = 'Edit';

        return view('admin.resource-content.edit', compact('data', 'title', 'sub_title'));
    }

    public function update(UpdateResourceContentRequest $request, $id)
    {
        abort_unless(Gate::allows('resource-contents-edit'), 403);
        try {
            $save = ResourceContent::updateData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/resource-contents',
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
}
