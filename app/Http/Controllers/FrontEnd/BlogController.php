<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\BlogSeo;
use App\Models\Page;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::getFullDataForHome();
        $blogContents = BlogContent::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());

        return view('frontend.pages.blogs', compact('blogs','blogContents','seo'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        if(!$blog){
            abort(404);
        }

        $seo = BlogSeo::getSeoDetails($blog->id);

        return view('frontend.pages.blog-detail', compact('blog','seo'));
    }
}
