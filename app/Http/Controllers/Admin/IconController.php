<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IconController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('icons'), 403);
        $title = 'Icon';
        $sub_title = 'Icon';

        return view('admin.icons.index', compact('title', 'sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('icons-create'), 403);
        $title = 'Icon';
        $sub_title = 'Add';
        return view('admin.icons.create', compact('title', 'sub_title'));
    }

    public function store(Request $request)
    {
        abort_unless(Gate::allows('icons-create'), 403);
        try {
            $save = Icon::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/icons',
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
        abort_unless(Gate::allows('icons'), 403);
        $data = Icon::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('icons-edit'), 403);
        $data = Icon::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Icon';
        $sub_title = 'Edit';
        return view('admin.icons.edit', compact('data', 'title', 'sub_title'));
    }

    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('icons-edit'), 403);
        try {
            $save = Icon::updateData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/icons',
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
        abort_unless(Gate::allows('icons-delete'), 403);
        $delete = Icon::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Icon::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Icon::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
