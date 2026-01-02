<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Explore;
use App\Models\Faq;
use App\Models\Home;
use App\Models\Icon;
use App\Models\Journey;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SubServices;
use App\Models\ProcessStep;
use App\Models\ServicePoint;
use App\Models\Testimonial;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;
use DOMDocument;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::getFullDataForHome();
        $serviceCategory = ServiceCategory::getFullDataForHome();
        $services = Service::getFullDataForHome(); // Load services with ServicePoint relationship
        $whoweare = WhoWeAre::getFullDataForHome();
        $journey = Journey::getFullDataForHome();
        $certificate = Certificate::getFullDataForHome();
        $testimonials = Testimonial::getFullDataForHome();
        $blogs = Blog::getFullDataForHome();
        $explore = Explore::getFullDataForHome();
        $faqs = Faq::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $home = Home::getFullDataForHome();
        $icons = Icon::getFullDataForHome();
        $processSteps = ProcessStep::getFullDataForHome();
        
        // Create mapping of service names to their URLs (same as services page)
        $serviceLinks = $this->buildServiceLinksMapping();

        return view('frontend.pages.home-new', compact('certificate', 'testimonials', 'seo', 'banner', 'serviceCategory', 'services', 'whoweare', 'journey', 'blogs', 'explore', 'faqs', 'home', 'icons', 'serviceLinks', 'processSteps'));
    }

    function convertHtml()
    {
        // Load the HTML table into a DOMDocument object

        $data = ServicePoint::all();

        foreach ($data as $value) {
            $dom = new DOMDocument();

            // Suppress warnings for malformed HTML using `@`
            @$dom->loadHTML($value->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            // Find the first table in the DOM
            $table = $dom->getElementsByTagName('table')->item(0);

            // If no table is found, skip this iteration
            if (!$table) {
                continue;
            }

            // Initialize the output string
            $output = '';

            // Process all rows in the table
            $rows = $table->getElementsByTagName('tr');
            foreach ($rows as $tr) {
                // Process the first header cell (<th>) into <h2>
                $headerCells = $tr->getElementsByTagName('th');
                if ($headerCells->length > 0) {
                    $output .= '<h2 style="font-size: 24px; color: white; margin: 10px 0;">';
                    foreach ($headerCells as $th) {
                        $output .=  htmlspecialchars($th->textContent);
                    }
                    $output .= '</h2>';
                }

                // Process the first data cell (<td>) into <p>
                $dataCells = $tr->getElementsByTagName('td');
                if ($dataCells->length > 0) {
                    $output .= '<p style="font-size: 16px; color: white; margin: 5px 0;">';
                    foreach ($dataCells as $td) {
                        $output .=  htmlspecialchars($td->textContent);
                    }
                    $output .= '</p>';
                }
            }

            // Update the description with the new structure
            $value->description = $output;
            $value->save();
        }
    }
    
    /**
     * Build a mapping of service names to their detail page URLs
     * Checks both Service and SubServices models
     *
     * @return array
     */
    private function buildServiceLinksMapping()
    {
        $serviceLinks = [];
        
        // List of service names to map (as they appear in the category cards)
        $serviceNames = [
            'Express Entry',
            'PNP',
            'Family Sponsorship',
            'Business/Investor Visa',
            'PGWP',
            'Spouse Open Work Permit',
            'Visiting Visa',
            'Super Visa',
            'IAD Appeals',
            'Refusal and Reapplication',
            'RCIP',
            'AIP',
            'Home Caregiver',
            'Labour Market Impact Assessment'
        ];

        // Fetch services from Service model
        $services = Service::whereIn('title', $serviceNames)
            ->where('status', 1)
            ->get();

        foreach ($services as $service) {
            if ($service->slug) {
                $serviceLinks[$service->title] = url('service-details/' . $service->slug);
            }
        }

        // Fetch services from SubServices model
        $subServices = SubServices::whereIn('title', $serviceNames)
            ->where('status', 1)
            ->get();

        foreach ($subServices as $subService) {
            if ($subService->slug) {
                $serviceLinks[$subService->title] = url('sub-service-details/' . $subService->slug);
            }
        }

        return $serviceLinks;
    }
}
