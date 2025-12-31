<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class UpdateHomePageBannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deactivate all existing banners
        Banner::where('status', 1)->update(['status' => 0]);

        // Define the new banners with content
        $newBanners = [
            [
                'title' => 'Immigration feels complex. We make it clear, easy, and convenient.',
                'badge_text' => 'Your Trusted Partner For Canada Immigration',
                'sub_title' => 'Every immigration story is different, & we help turn those into real facts with the right immigration process.',
                'description' => 'At KGraph Immigration Consultancy, we are the most reliable partner for the Canadian Migration process. With 10,000+ successful immigration cases and more than 100 ongoing cases, we are consistently up to date on IRCC rules. We provide you with transparent guidance, full-proof documentation, and legal representation that make your Canada immigration journey easier.',
                'image' => 'https://images.pexels.com/photos/1595385/pexels-photo-1595385.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                'intervention_image' => 'https://images.pexels.com/photos/1595385/pexels-photo-1595385.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                'alt_tag' => 'Canadian Immigration Services',
                'status' => 1,
                'order' => 0
            ],
            [
                'title' => 'Experience, Excellence, and Expertise!',
                'badge_text' => 'Your Canadian Immigration - In Trusted Hands',
                'sub_title' => 'We operate with complete authorisation under RCIC, CAPIC, and the Ministry of the Attorney General, Ontario, so your application stays compliant, transparent, and protected at every stage.',
                'description' => null,
                'image' => 'https://images.pexels.com/photos/1519088/pexels-photo-1519088.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                'intervention_image' => 'https://images.pexels.com/photos/1519088/pexels-photo-1519088.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                'alt_tag' => 'Immigration Consultation',
                'status' => 1,
                'order' => 1
            ],
            [
                'title' => 'Immigration feels complex. We make it clear, easy, and convenient.',
                'badge_text' => 'Your Trusted Partner For Canada Immigration',
                'sub_title' => 'Every immigration story is different, & we help turn those into real facts with the right immigration process.',
                'description' => 'At KGraph Immigration Consultancy, we are the most reliable partner for the Canadian Migration process. With 10,000+ successful immigration cases and more than 100 ongoing cases, we are consistently up to date on IRCC rules. We provide you with transparent guidance, full-proof documentation, and legal representation that make your Canada immigration journey easier.',
                'image' => 'https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                'intervention_image' => 'https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop',
                'alt_tag' => 'Canada Immigration Services',
                'status' => 1,
                'order' => 2
            ]
        ];

        // Insert new banners
        foreach ($newBanners as $banner) {
            Banner::create($banner);
        }

        $this->command->info('Homepage banners have been updated successfully!');
        $this->command->info('Old banners deactivated. 3 new banners with content added.');
    }
}
