<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogContent;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::getFullDataForHome();
        $blogContents = BlogContent::getFullDataForHome();

        return view('frontend.pages.blogs', compact('blogs','blogContents'));
    }
}
