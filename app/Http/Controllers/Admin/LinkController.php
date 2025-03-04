<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LinkController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('links'), 403);
        $title = 'Links';
        $sub_title = 'Links';

        return view('admin.links.index', compact('title', 'sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('links-create'), 403);
        $title = 'Links';
        $sub_title = 'Add';

        return view('admin.links.create', compact('title', 'sub_title'));
    }

    public function store(Request $request)
    {
        abort_unless(Gate::allows('links-create'), 403);
        try {
            $save = Link::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/links',
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
        abort_unless(Gate::allows('links'), 403);
        $data = Link::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('links-edit'), 403);
        $data = Link::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Links';
        $sub_title = 'Edit';

        return view('admin.links.edit', compact('data', 'title', 'sub_title'));
    }

    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('links-edit'), 403);
        try {
            $save = Link::updateData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/links',
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
        abort_unless(Gate::allows('links-delete'), 403);
        $delete = Link::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Link::changeStatus($request);
        return response()->json($data);
    }

    // public function changeOrder(Request $request)
    // {
    //     $newOrder = $request->input('order');

    //     Link::updateOrder($request);

    //     return response()->json(['message' => 'Order updated successfully']);
    // }
}
