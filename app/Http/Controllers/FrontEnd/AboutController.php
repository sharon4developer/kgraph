<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Crew;
use App\Models\Journey;
use App\Models\Location;
use App\Models\OurStory;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $journey = Journey::getFullDataForHome();
        $ourStory = OurStory::getFullDataForHome();
        $locations = Location::getFullDataForHome();
        $aboutUs = AboutUs::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());

        return view('frontend.pages.about',compact('journey','ourStory','locations','aboutUs','seo'));
    }

    public function crewShow()
    {
        $data = Crew::getFullDataForHome();
        return response()->json([
            'status'=> true,
            'count' => count($data->get()),
            'crew'=> $data->paginate(10),
            'location' => $request->locationName ?? 'kochi',
            'pagination' => (string)$data->paginate(10)->links('pagination::bootstrap-4')

        ]);
    }
}
