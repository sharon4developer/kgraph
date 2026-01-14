<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Page;
use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceContent;
use App\Models\ServiceSeo;
use App\Models\SubServices;
use App\Models\SubServiceSeo;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceCategory = ServiceCategory::getFullDataForHome();
        $certificate = Certificate::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $serviceContents = ServiceContent::getFullDataForHome();

        // Create mapping of service names to their URLs
        $serviceLinks = $this->buildServiceLinksMapping();

        return view('frontend.pages.services', compact('certificate', 'seo', 'serviceCategory', 'serviceContents', 'serviceLinks'));
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

    public function serviceDetails($slug)
    {
        $services = Service::with([
            'SubService' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'ServicePoint' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'ServicePoint.ServicePointContents' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'ServicePoint.ServicePointContents.Title' => function($query) {
                $query->orderBy('id', 'asc');
            },
            'ServicePoint.ServicePointContents.Title.paragraphs',
            'ServicePoint.ServicePointContents.Title.options',
            'ServicePoint.ServicePointContents.Title.options.subOptions',
            'ServiceFaq' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'ServiceCategory'
        ])
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$services) {
            abort(404);
        }

        $seo = ServiceSeo::getSeoDetails($services->id);

        // Get related services from the same category
        $relatedServices = Service::where('service_category_id', $services->service_category_id)
            ->where('id', '!=', $services->id)
            ->where('status', 1)
            ->take(3)
            ->get();

        // Extract processing time durations for all programs
        $processingTimeDurations = $this->extractProcessingTimeDurationsByProgram($services);
        
        // Fetch service-specific process steps, fall back to default if none exist
        $processSteps = ProcessStep::getFullDataForService($services->id);
        if ($processSteps->isEmpty()) {
            $processSteps = ProcessStep::getFullDataForHome();
        }

        $hasSubServices = $services->SubService->count() > 0;
        $hasServicePointContents = $services->ServicePoint
            ->pluck('ServicePointContents')
            ->flatten()
            ->isNotEmpty();

        if ($hasSubServices || !$hasServicePointContents) {
            return view('frontend.pages.servicesinner', compact('services', 'seo', 'relatedServices', 'processingTimeDurations', 'processSteps'));
        } else {
            return view('frontend.pages.subservicesinner', compact('services', 'seo', 'relatedServices', 'processingTimeDurations', 'processSteps'));
        }
    }


    public function eligibilityCheck($id = 1)
    {
        $seo = Page::getSeoDetails(request()->path());
        $pageTitle = 'KGRAPH Assessment';

        return view('frontend.pages.servicesinerform', compact('seo', 'pageTitle'));
    }

    public function subServiceDetails($slug)
    {
        $services = SubServices::with([
            'ServicePoint' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'ServicePoint.ServicePointContents' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'ServicePoint.ServicePointContents.Title' => function($query) {
                $query->orderBy('id', 'asc');
            },
            'ServicePoint.ServicePointContents.Title.paragraphs',
            'ServicePoint.ServicePointContents.Title.options',
            'ServicePoint.ServicePointContents.Title.options.subOptions',
            'ServiceFaq' => function($query) {
                $query->where('status', 1)->orderBy('order', 'asc');
            },
            'Services' => function($query) {
                $query->with('ServiceCategory');
            }
        ])
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$services) {
            abort(404);
        }

        $seo = SubServiceSeo::getSeoDetails($services->id);

        // Get related sub-services from the same parent service
        $relatedServices = SubServices::where('service_id', $services->service_id)
            ->where('id', '!=', $services->id)
            ->where('status', 1)
            ->take(3)
            ->get();

        // Extract processing time durations for all programs
        $processingTimeDurations = $this->extractProcessingTimeDurationsByProgram($services);
        
        // Fetch process steps for parent service, fall back to default if none exist
        $processSteps = ProcessStep::getFullDataForService($services->service_id);
        if ($processSteps->isEmpty()) {
            $processSteps = ProcessStep::getFullDataForHome();
        }

        return view('frontend.pages.subservicesinner', compact('services', 'seo', 'relatedServices', 'processingTimeDurations', 'processSteps'));
    }

    /**
     * Extract processing time durations for each program
     * Returns an array keyed by program index with processing time for each program
     * Priority: 1. Service-level processing_time field, 2. Processing Time tab content for each program, 3. Default
     *
     * @param mixed $service
     * @return array
     */
    private function extractProcessingTimeDurationsByProgram($service)
    {
        // Enhanced regex patterns to match various duration formats
        // Pattern 1: Matches "X to Y days/months/etc" or "X-Y days/months/etc" (supports 1-4 digit numbers)
        $rangePattern = '/(\d{1,4})\s*(?:to|and|-)\s*(\d{1,4})\s*(months?|weeks?|days?|years?)/i';
        // Pattern 2: Matches single number with unit "X days/months/etc"
        $singlePattern = '/(\d{1,4})\s*(months?|weeks?|days?|years?)/i';
        
        $processingTimeDurations = [];
        $defaultDuration = '4 - 12 months';
        
        // Priority 1: Check service-level processing_time first (if available)
        if (isset($service->processing_time) && !empty(trim($service->processing_time))) {
            $duration = trim($service->processing_time);
            $duration = preg_replace('/\s+to\s+/i', ' - ', $duration);
            $duration = preg_replace('/(\d+)\s*-\s*(\d+)/', '$1 - $2', $duration);
            $defaultDuration = $duration;
        }

        // Priority 2: Extract processing time for EACH program separately
        $servicePoints = $service->ServicePoint ?? collect([]);
        if ($servicePoints->count() > 0) {
            foreach ($servicePoints as $programIndex => $servicePoint) {
                $programDuration = null;
                
                // Search Processing Time tab for this specific program
                $contentTabs = $servicePoint->ServicePointContents ?? collect([]);
                
                foreach ($contentTabs as $contentTab) {
                    $tabTitle = strtolower(trim($contentTab->title));
                    if ($tabTitle === 'processing time' || $tabTitle === 'processing' || strpos($tabTitle, 'processing time') !== false) {
                        $titles = $contentTab->Title ?? collect([]);
                        
                        if ($titles->count() > 0) {
                            foreach ($titles as $title) {
                                // Check paragraphs
                                $paragraphs = $title->paragraphs ?? collect([]);
                                foreach ($paragraphs as $paragraph) {
                                    $content = strip_tags($paragraph->content ?? '');
                                    $content = preg_replace('/\s+/', ' ', $content);
                                    
                                    // Try range pattern first (e.g., "90 to 120 days", "6-12 months")
                                    if (preg_match($rangePattern, $content, $matches)) {
                                        $num1 = trim($matches[1]);
                                        $num2 = trim($matches[2]);
                                        $unit = strtolower(trim($matches[3]));
                                        // Normalize unit (singular/plural)
                                        if (strpos($unit, 'month') !== false) $unit = 'months';
                                        elseif (strpos($unit, 'week') !== false) $unit = 'weeks';
                                        elseif (strpos($unit, 'day') !== false) $unit = 'days';
                                        elseif (strpos($unit, 'year') !== false) $unit = 'years';
                                        
                                        $programDuration = $num1 . ' - ' . $num2 . ' ' . $unit;
                                        break 2; // Break out of title and paragraph loops
                                    }
                                    // Try single number pattern (e.g., "6 months", "90 days")
                                    elseif (preg_match($singlePattern, $content, $matches)) {
                                        $num = trim($matches[1]);
                                        $unit = strtolower(trim($matches[2]));
                                        // Normalize unit (singular/plural)
                                        if (strpos($unit, 'month') !== false) $unit = 'months';
                                        elseif (strpos($unit, 'week') !== false) $unit = 'weeks';
                                        elseif (strpos($unit, 'day') !== false) $unit = 'days';
                                        elseif (strpos($unit, 'year') !== false) $unit = 'years';
                                        
                                        $programDuration = $num . ' ' . $unit;
                                        break 2; // Break out of title and paragraph loops
                                    }
                                }
                                
                                // Check options
                                $options = $title->options ?? collect([]);
                                foreach ($options as $option) {
                                    $value = $option->value ?? '';
                                    $value = preg_replace('/\s+/', ' ', $value);
                                    
                                    // Try range pattern first
                                    if (preg_match($rangePattern, $value, $matches)) {
                                        $num1 = trim($matches[1]);
                                        $num2 = trim($matches[2]);
                                        $unit = strtolower(trim($matches[3]));
                                        // Normalize unit (singular/plural)
                                        if (strpos($unit, 'month') !== false) $unit = 'months';
                                        elseif (strpos($unit, 'week') !== false) $unit = 'weeks';
                                        elseif (strpos($unit, 'day') !== false) $unit = 'days';
                                        elseif (strpos($unit, 'year') !== false) $unit = 'years';
                                        
                                        $programDuration = $num1 . ' - ' . $num2 . ' ' . $unit;
                                        break 2; // Break out of title and option loops
                                    }
                                    // Try single number pattern
                                    elseif (preg_match($singlePattern, $value, $matches)) {
                                        $num = trim($matches[1]);
                                        $unit = strtolower(trim($matches[2]));
                                        // Normalize unit (singular/plural)
                                        if (strpos($unit, 'month') !== false) $unit = 'months';
                                        elseif (strpos($unit, 'week') !== false) $unit = 'weeks';
                                        elseif (strpos($unit, 'day') !== false) $unit = 'days';
                                        elseif (strpos($unit, 'year') !== false) $unit = 'years';
                                        
                                        $programDuration = $num . ' ' . $unit;
                                        break 2; // Break out of title and option loops
                                    }
                                }
                                
                                if ($programDuration) {
                                    break; // Found duration, stop searching other titles
                                }
                            }
                        }
                        
                        if ($programDuration) {
                            break; // Found duration, stop searching other tabs
                        }
                    }
                }
                
                // Use program-specific duration or fall back to default
                $processingTimeDurations[$programIndex] = $programDuration ?? $defaultDuration;
            }
        } else {
            // No programs found, use default for index 0
            $processingTimeDurations[0] = $defaultDuration;
        }

        return $processingTimeDurations;
    }
}
