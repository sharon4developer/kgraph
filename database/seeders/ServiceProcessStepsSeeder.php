<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcessStep;
use App\Models\Service;

class ServiceProcessStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all active services
        $services = Service::where('status', 1)->get();
        
        // Default process steps data (from hardcoded view)
        $defaultSteps = [
            [
                'step_number' => '01',
                'title' => 'Initial Assessment',
                'description' => 'We evaluate your eligibility and create a personalized strategy',
                'timeline' => '1-2 days',
                'icon' => 'users',
                'order' => 1,
            ],
            [
                'step_number' => '02',
                'title' => 'Document Preparation',
                'description' => 'Compile and prepare all required documentation',
                'timeline' => '2-4 weeks',
                'icon' => 'briefcase',
                'order' => 2,
            ],
            [
                'step_number' => '03',
                'title' => 'Application Submission',
                'description' => 'Submit your complete application to IRCC',
                'timeline' => '1 week',
                'icon' => 'check-circle',
                'order' => 3,
            ],
            [
                'step_number' => '04',
                'title' => 'Processing & Follow-up',
                'description' => 'Monitor application status and respond to any requests',
                'timeline' => null, // Dynamic - will be handled in view
                'icon' => 'clock',
                'order' => 4,
            ],
        ];

        $insertedCount = 0;
        $skippedCount = 0;

        foreach ($services as $service) {
            // Check if process steps already exist for this service
            $existingSteps = ProcessStep::where('service_id', $service->id)->count();
            
            if ($existingSteps === 0) {
                // Insert process steps for this service
                foreach ($defaultSteps as $stepData) {
                    ProcessStep::create([
                        'service_id' => $service->id,
                        'step_number' => $stepData['step_number'],
                        'title' => $stepData['title'],
                        'description' => $stepData['description'],
                        'icon' => $stepData['icon'],
                        'order' => $stepData['order'],
                        'status' => 1,
                        'timeline' => $stepData['timeline'],
                        'is_default' => false,
                    ]);
                }
                
                $insertedCount++;
                $this->command->info("✓ Inserted process steps for service: {$service->title}");
            } else {
                $skippedCount++;
                $this->command->warn("⊘ Skipped service: {$service->title} (already has {$existingSteps} process steps)");
            }
        }

        $this->command->info("\n=== Summary ===");
        $this->command->info("Total services processed: " . $services->count());
        $this->command->info("Process steps inserted for: {$insertedCount} services");
        $this->command->info("Services skipped: {$skippedCount}");
        $this->command->info("Total process steps created: " . ($insertedCount * 4));
    }
}
