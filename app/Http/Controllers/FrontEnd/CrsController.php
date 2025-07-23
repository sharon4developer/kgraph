<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;  // make sure this points to your actual SEO model

class CrsController extends Controller
{
    public function index()
    {
        // Try to load a custom SEO record for this page
         $seoRecord = ''; // Seo::where('page_slug', 'crs-calculator')->first();

        // If none exists, build a default object
        if (! $seoRecord) {
            $defaults = (object) [
                'meta_title'       => 'Canada Express Entry CRS Calculator – Estimate Your CRS Score | Kgraph',
                'meta_description' => 'Use Kgraph’s free Canada Express Entry CRS Calculator to accurately estimate your Comprehensive Ranking System score. Enter your age, education, language proficiency, and work experience for a real-time CRS score.',
                'meta_keywords'    => 'CRS calculator, Express Entry, Canada immigration, CRS score, Canada PR points, Comprehensive Ranking System calculator',
                'og_title'         => 'Canada Express Entry CRS Calculator – Kgraph',
                'og_description'   => 'Estimate your Canada Express Entry CRS score in seconds with Kgraph’s easy-to-use calculator.',
                'og_image'         => asset('assets/crs_cal_banner.png'),
                'og_url'           => url()->current(),
                'schema'           => json_encode([
                    '@context'    => 'https://schema.org',
                    '@type'       => 'WebPage',
                    'name'        => 'Canada Express Entry CRS Calculator',
                    'description' => 'Use Kgraph’s free Canada Express Entry CRS Calculator to accurately estimate your Comprehensive Ranking System score.',
                    'url'         => url()->current(),
                    'image'       => asset('assets/crs_cal_banner.png'),
                ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
            ];

            $seoRecord = $defaults;
        }

        // Blade expects $seo->Seo
        $seo = (object) ['Seo' => $seoRecord];

        return view('frontend.pages.crs_calculator', compact('seo'));
    }
}
