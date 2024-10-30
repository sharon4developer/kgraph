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

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        if(!$blog){
            abort(404);
        }

        return view('frontend.pages.blog-detail', compact('blog'));
    }
}
