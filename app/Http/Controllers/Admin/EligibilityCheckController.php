<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Models\EligibilityCheck;
use Illuminate\Http\Request;

class EligibilityCheckController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('eligibility-check'), 403);
        $title = 'Eligibility Check';
        $sub_title = 'Eligibility Check';

        return view('admin.eligibility-check.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        abort_unless(Gate::allows('eligibility-check'), 403);
        $data = EligibilityCheck::getData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('eligibility-check-edit'), 403);
        $data = EligibilityCheck::getFullData($id);

        return response()->json(['data'=>$data,'status'=>true]);
    }

    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('eligibility-check-delete'), 403);
        $delete = EligibilityCheck::deleteData($request);
        return response()->json($delete);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        EligibilityCheck::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
