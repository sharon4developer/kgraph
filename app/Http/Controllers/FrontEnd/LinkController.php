<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function show($slug)
    {
        $data = Link::getDataForHome($slug);

        if (!$data) {
            abort(404);
        }

        return view('frontend.pages.link', compact('data'));
    }
}
