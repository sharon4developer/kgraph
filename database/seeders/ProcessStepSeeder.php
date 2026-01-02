<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcessStep;

class ProcessStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSteps = [
            [
                'service_id' => null,
                'step_number' => '01',
                'title' => 'Free Assessment',
                'description' => 'We understand your background, goals, and concerns, assessing your eligibility to explain which immigration pathways best suit you.',
                'icon' => 'users',
                'order' => 1,
                'status' => 1,
                'timeline' => null,
                'is_default' => true,
            ],
            [
                'service_id' => null,
                'step_number' => '02',
                'title' => 'Strategy Development',
                'description' => 'We develop a clear immigration strategy for your profile by assessing your eligibility, documentation, and long-term plans.',
                'icon' => 'shield',
                'order' => 2,
                'status' => 1,
                'timeline' => null,
                'is_default' => true,
            ],
            [
                'service_id' => null,
                'step_number' => '03',
                'title' => 'Application Preparation',
                'description' => 'Our team manages your application preparation, ensuring accuracy with Canadian immigration requirements.',
                'icon' => 'check',
                'order' => 3,
                'status' => 1,
                'timeline' => null,
                'is_default' => true,
            ],
            [
                'service_id' => null,
                'step_number' => '04',
                'title' => 'Success & Ongoing Support',
                'description' => 'After submission or approval, guide you in preparing for your next steps to support your transition to Canada.',
                'icon' => 'award',
                'order' => 4,
                'status' => 1,
                'timeline' => null,
                'is_default' => true,
            ],
        ];

        foreach ($defaultSteps as $step) {
            ProcessStep::create($step);
        }
    }
}
