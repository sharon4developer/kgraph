<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Models\AppliedCareer;
use Illuminate\Http\Request;

class AppliedCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('applied-career'), 403);
        $title = 'Careers';
        $sub_title = 'Careers';

        return view('admin.applied-career.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        abort_unless(Gate::allows('applied-career'), 403);
        $data = AppliedCareer::getFullData($request);
        return $data;
    }

    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('applied-career-delete'), 403);
        $delete = AppliedCareer::deleteData($request);
        return response()->json($delete);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        AppliedCareer::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
