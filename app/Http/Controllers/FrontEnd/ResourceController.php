<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\ResourceContent;
use App\Models\ResourceSeo;
use App\Models\Page;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $categories = ResourceCategory::getActiveCategories();

        $activeCategory = $request->query('category');

        $resources = Resource::with('Category')
            ->select('image', 'id', 'title', 'description', 'excerpt', 'date', 'time', 'category_id', 'alt_tag', 'slug')
            ->where('status', 1)
            ->when($activeCategory, function ($query) use ($activeCategory) {
                $query->whereHas('Category', function ($q) use ($activeCategory) {
                    $q->where('slug', $activeCategory);
                });
            })
            ->orderBy('order', 'asc')
            ->get();

        $resourceContents = ResourceContent::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());

        return view('frontend.pages.resources', compact('resources', 'categories', 'resourceContents', 'activeCategory', 'seo'));
    }

    public function show($slug)
    {
        $resource = Resource::with('Category')->where('slug', $slug)->first();

        if (!$resource) {
            abort(404);
        }

        $seo = ResourceSeo::getSeoDetails($resource->id);

        $relatedResources = Resource::with('Category')
            ->select('image', 'id', 'title', 'excerpt', 'date', 'time', 'category_id', 'alt_tag', 'slug')
            ->where('status', 1)
            ->where('id', '!=', $resource->id)
            ->when($resource->category_id, function ($query) use ($resource) {
                $query->where('category_id', $resource->category_id);
            })
            ->orderBy('order', 'asc')
            ->take(3)
            ->get();

        return view('frontend.pages.resource-detail', compact('resource', 'relatedResources', 'seo'));
    }
}
