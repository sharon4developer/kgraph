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
}
