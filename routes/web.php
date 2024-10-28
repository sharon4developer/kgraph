<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AppliedCareerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogContentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CareerBranchController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CareerDepartmentController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CrewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EligibilityCheckController;
use App\Http\Controllers\Admin\ExploreController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\JourneyController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\NewsLetterController as AdminNewsLetterController;
use App\Http\Controllers\Admin\OurStoryController;
use App\Http\Controllers\Admin\PackageContentController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageFaqController;
use App\Http\Controllers\Admin\PackagePointController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceFaqController;
use App\Http\Controllers\Admin\ServicePointController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhoWeAreController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\BlogController as FrontEndBlogController;
use App\Http\Controllers\FrontEnd\CareerController as FrontEndCareerController;
use App\Http\Controllers\FrontEnd\ContactUsController as FrontEndContactUsController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\NewsLetterController;
use App\Http\Controllers\FrontEnd\PackageController as FrontEndPackageController;
use App\Http\Controllers\FrontEnd\ServiceController as FrontEndServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('services', [FrontEndServiceController::class, 'index']);
Route::get('service-details/{id}', [FrontEndServiceController::class, 'serviceDetails']);
Route::get('eligibility-check/{id}', [FrontEndServiceController::class, 'eligibilityCheck']);
Route::get('blogs', [FrontEndBlogController::class, 'index']);
Route::get('about-us', [AboutController::class, 'index']);
Route::post('fetch-crew', [AboutController::class, 'crewShow']);
Route::get('packages', [FrontEndPackageController::class, 'index']);
Route::get('package-details/{id}', [FrontEndPackageController::class, 'packageDetails']);
Route::get('careers', [FrontEndCareerController::class, 'index']);
Route::get('contact-us', [FrontEndContactUsController::class, 'index']);
Route::post('submit-news-letter', [NewsLetterController::class, 'submitNewsLetter'])->name('submit-news-letter');
Route::post('submit-contact-form', [NewsLetterController::class, 'submitContact'])->name('submit-contact-form');
Route::post('submit-career-form', [NewsLetterController::class, 'submitCareer'])->name('submit-career-form');
Route::post('submit-eligibility-form', [NewsLetterController::class, 'submitEligibility'])->name('submit-eligibility-form');

Auth::routes();

Route::get('/logout-me', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {

    Route::prefix('dashboard')->name('.dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::resources([

        'banners' => BannerController::class,
        'services' => ServiceController::class,
        'service-points' => ServicePointController::class,
        'service-faq' => ServiceFaqController::class,
        'who-we-are' => WhoWeAreController::class,
        'testimonials' => TestimonialController::class,
        'faq' => FaqController::class,
        'blogs' => BlogController::class,
        'explore' => ExploreController::class,
        'certificates' => CertificateController::class,
        'journey' => JourneyController::class,
        'crew' => CrewController::class,
        'our-story' => OurStoryController::class,
        'locations' => LocationController::class,
        'careers' => CareerController::class,
        'privacy-policy' => PrivacyPolicyController::class,
        'terms-and-condition' => TermsAndConditionController::class,
        'contact-us' => ContactUsController::class,
        'packages' => PackageController::class,
        'package-points' => PackagePointController::class,
        'package-faq' => PackageFaqController::class,
        'pages' => PageController::class,
        'career-departments' => CareerDepartmentController::class,
        'career-branches' => CareerBranchController::class,
        'about-us' => AboutUsController::class,
        'service-categories' => ServiceCategoryController::class,
        'home' => AdminHomeController::class,
        'service-contents' => ServiceContentController::class,
        'package-contents' => PackageContentController::class,
        'blog-contents' => BlogContentController::class,
        'news-letter' => AdminNewsLetterController::class,
        'contact' => ContactController::class,
        'applied-career' => AppliedCareerController::class,
        'eligibility-check' => EligibilityCheckController::class,
    ]);

    Route::prefix('pages')->name('.pages')->group(function () {
        Route::resources([
            'seo' => SeoController::class,
            'cms' => CmsController::class,
        ]);
        Route::post('change/status', [PageController::class, 'changeStatus'])->name('change-status');
    });

    Route::prefix('banners')->name('.banners')->group(function () {

        Route::post('change/status', [BannerController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [BannerController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('services')->name('.services')->group(function () {

        Route::post('change/status', [ServiceController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServiceController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('service-points')->name('.service-points')->group(function () {

        Route::post('change/status', [ServicePointController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServicePointController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('service-faq')->name('.service-faq')->group(function () {

        Route::post('change/status', [ServiceFaqController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServiceFaqController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('who-we-are')->name('.who-we-are')->group(function () {

        Route::post('change/status', [WhoWeAreController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [WhoWeAreController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('testimonials')->name('.testimonials')->group(function () {

        Route::post('change/status', [TestimonialController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [TestimonialController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('faq')->name('.faq')->group(function () {

        Route::post('change/status', [FaqController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [FaqController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('explore')->name('.explore')->group(function () {

        Route::post('change/status', [ExploreController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ExploreController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('certificates')->name('.certificates')->group(function () {

        Route::post('change/status', [CertificateController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [CertificateController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('crew')->name('.crew')->group(function () {

        Route::post('change/status', [CrewController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [CrewController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('our-story')->name('.our-story')->group(function () {

        Route::post('change/status', [OurStoryController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [OurStoryController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('locations')->name('.locations')->group(function () {

        Route::post('change/status', [LocationController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [LocationController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('careers')->name('.careers')->group(function () {

        Route::post('change/status', [CareerController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [CareerController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('packages')->name('.packages')->group(function () {

        Route::post('change/status', [PackageController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [PackageController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('package-points')->name('.package-points')->group(function () {

        Route::post('change/status', [PackagePointController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [PackagePointController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('package-faq')->name('.package-faq')->group(function () {

        Route::post('change/status', [PackageFaqController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [PackageFaqController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('career-departments')->name('.career-departments')->group(function () {

        Route::post('change/status', [CareerDepartmentController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [CareerDepartmentController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('career-branches')->name('.career-branches')->group(function () {

        Route::post('change/status', [CareerBranchController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [CareerBranchController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('service-categories')->name('.service-categories')->group(function () {

        Route::post('change/status', [ServiceCategoryController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServiceCategoryController::class, 'changeOrder'])->name('update-order');
    });
});
