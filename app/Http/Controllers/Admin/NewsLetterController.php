<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_unless(Gate::allows('news-letter'), 403);
        $title = 'News Letters';
        $sub_title = 'News Letters';


        return view('admin.news-letter.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        abort_unless(Gate::allows('news-letter'), 403);
        $data = NewsLetter::getFullData($request);
        return $data;
    }

    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('news-letter-delete'), 403);
        $delete = NewsLetter::deleteData($request);
        return response()->json($delete);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        NewsLetter::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
