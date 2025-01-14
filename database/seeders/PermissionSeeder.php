<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
         




            'banners',
            'banners-create',
            'banners-edit',
            'banners-delete',

            'services',
            'services-create',
            'services-edit',
            'services-delete',

            'service-points',
            'service-points-create',
            'service-points-edit',
            'service-points-delete',

            'service-faq',
            'service-faq-create',
            'service-faq-edit',
            'service-faq-delete',

            'who-we-are',
            'who-we-are-create',
            'who-we-are-edit',
            'who-we-are-delete',

            'testimonials',
            'testimonials-create',
            'testimonials-delete',
            'testimonials-edit',

            'faq',
            'faq-create',
            'faq-edit',
            'faq-delete',

            'blogs',
            'blogs-create',
            'blogs-edit',
            'blogs-delete',

            'blogs-seo',
            'blogs-seo-create',
            'blogs-seo-edit',
            'blogs-seo-delete',

            'blog-content',
            'blog-content-create',
            'blog-content-edit',

            'explore',
            'explore-create',
            'explore-edit',
            'explore-delete',

            'certificates',
            'certificates-create',
            'certificates-edit',
            'certificates-delete',

            'journey',
            'journey-create',
            'journey-edit',
            'journey-delete',

            'crew',
            'crew-create',
            'crew-edit',
            'crew-delete',

            'our-story',
            'our-story-create',
            'our-story-edit',
            'our-story-delete',

            'locations',
            'locations-create',
            'locations-edit',
            'locations-delete',

            'careers',
            'careers-create',
            'careers-edit',
            'careers-delete',


            'sub-admin',
            'sub-admin-create',
            'sub-admin-edit',
            'sub-admin-delete',


            'roles',
            'roles-create',
            'roles-edit',
            'roles-delete',

            'service-point-content',
            'service-point-content-create',
            'service-point-content-edit',
            'service-point-content-delete',


            'careers-departments',
            'careers-departments-create',
            'careers-departments-edit',
            'careers-departments-delete',


            'career-contents',
            'career-contents-create',
            'career-contents-edit',
            // 'career-contents-delete',

            'career-branches',
            'career-branches-create',
            'career-branches-edit',
            'career-branches-delete',

            'privacy-policy',
            'privacy-policy-create',
            // 'privacy-policy-edit',
            // 'privacy-policy-delete',

            'terms-and-condition',
            'terms-and-condition-create',
            // 'terms-and-condition-edit',
            // 'terms-and-condition-delete',

            'contact-us',
            'contact-us-create',
            // 'contact-us-edit',
            // 'contact-us-delete',

            'packages',
            'packages-create',
            'packages-edit',
            'packages-delete',

            'packages-seo',
            'packages-seo-create',
            'packages-seo-edit',
            'packages-seo-delete',

            'seo',
            'seo-create',
            'seo-edit',
            'seo-delete',

            'package-points',
            'package-points-create',
            'package-points-edit',
            'package-points-delete',

            'package-faq',
            'package-faq-create',
            'package-faq-edit',
            'package-faq-delete',

            'pages',
            'pages-create',
            'pages-edit',
            'pages-delete',

            'career-departments',
            'career-departments-create',
            // 'career-departments-edit',
            // 'career-departments-delete',

            // 'career-branches',
            // 'career-branches-create',
            // 'career-branches-edit',
            // 'career-branches-delete',

            'about-us',
            'about-us-create',
            'about-us-edit',
            // 'about-us-delete',

            'service-categories',
            'service-categories-create',
            'service-categories-edit',
            'service-categories-delete',

            'service-seo',
            'service-seo-create',
            // 'service-seo-edit',
            // 'service-seo-delete',

            'home',
            'home-create',
            'home-edit',
            'home-delete',

            'service-contents',
            'service-contents-create',
            'service-contents-edit',
            // 'service-contents-delete',

            'package-contents',
            'package-contents-create',
            'package-contents-edit',
            'package-contents-delete',

            'blog-contents',
            'blog-contents-create',
            // 'blog-contents-edit',
            // 'blog-contents-delete',

            'news-letter',
            // 'news-letter-create',
            // 'news-letter-edit',
            'news-letter-delete',

            'contact',
            // 'contact-create',
            // 'contact-edit',
            'contact-delete',

            'applied-career',
            'applied-career-create',
            // 'applied-career-edit',
            'applied-career-delete',

            'eligibility-check',
            // 'eligibility-check-create',
            'eligibility-check-edit',
            'eligibility-check-delete',

            // 'career-contents',
            // 'career-contents-create',
            // 'career-contents-edit',
            // 'career-contents-delete',

            'sub-services',
            'sub-services-create',
            'sub-services-edit',
            'sub-services-delete',


            'sub-service-faq',
            'sub-service-faq-create',
            'sub-service-faq-edit',
            'sub-service-faq-delete',

            'sub-service-points',
            'sub-service-points-create',
            'sub-service-points-edit',
            // 'sub-service-points-delete',

            'sub-service-point-contents',
            'sub-service-point-contents-create',
            // 'sub-service-point-contents-edit',
            // 'sub-service-point-contents-delete',
        ];
        foreach ($permissions as $permission) {
            $permissionExists = Permission::where('name', $permission)->exists();
            if (!$permissionExists) {
                $data[] = [
                    'name'       => $permission,
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        // Insert permissions in bulk
        Permission::insert($data);
    }
}
