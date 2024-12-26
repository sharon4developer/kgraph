<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'News Letters';
        $sub_title = 'News Letters';

        return view('admin.news-letter.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        $data = NewsLetter::getFullData($request);
        return $data;
    }

    public function destroy(Request $request)
    {
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
