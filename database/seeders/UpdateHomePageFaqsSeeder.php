<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class UpdateHomePageFaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'title' => 'How do I get started?',
                'description' => 'Getting started is not a difficult step for Canadian immigration if you know the right steps. The first step is understanding whether you\'re eligible and which immigration pathway suits your goals best. After this, we help you prepare the right documentation, such as language test results, educational credentials, and supporting records, so nothing important gets missed. Every application requires careful attention to detail, and that\'s where guidance matters most. We have licensed and experienced consultants walk you through each stage from initial consultation to final submission.',
                'order' => 0
            ],
            [
                'title' => 'How do I know if I am eligible for Canada Immigration?',
                'description' => 'Eligibility depends on multiple factors such as age, education, work experience, language proficiency, financial background, and long-term goals. Canada uses various structured systems like CRS scoring, provincial requirements, and application-based criteria. Defining eligibility does not rely only on online calculators. It requires a detailed professional review to understand where you qualify, which factors you realistically need, and what improvements you can try to strengthen your case before applying.',
                'order' => 1
            ],
            [
                'title' => 'How long does the Canada Immigration process usually take?',
                'description' => 'Immigration timelines vary based on your profile factors and the completion of your application. For Canada, programs such as Express Entry and Provincial Nominee Programs can take anywhere from a few months to over a year, depending on the CRS score or readiness of provincial documentation. Study and work permits may have shorter timelines, but still depend on intake caps and visa office processing.',
                'order' => 2
            ],
            [
                'title' => 'What is the exact step-by-step immigration process?',
                'description' => 'The process begins with a profile assessment to identify suitable immigration pathways. Once eligibility is confirmed, the next step involves preparing documents such as language test results, educational assessments, work records, and financial documents. After this, applications are submitted through appropriate government portals, followed by background checks, notices, and verification stages. Some pathways involve interviews and additional documentation as well. Throughout the process, timeline requirements and rules might change, which is why continuous monitoring and follow-ups are essential until a final decision is received.',
                'order' => 3
            ],
            [
                'title' => 'Can I apply on my own, or do I need professional guidance?',
                'description' => 'You are allowed to apply independently for Canadian immigration. However, immigration systems are rule-driven, data-sensitive, and frequently updated. Many refusals happen because applications are not updated with current documentation or have selected the wrong pathways. Professional guidance helps you avoid these mistakes, understand long-term implications, and choose strategies that actually protect your future plans, especially when family finances or family transitions are involved.',
                'order' => 4
            ],
            [
                'title' => 'What are the most common reasons applicants get delayed reviews?',
                'description' => 'Delayed reviews usually happen due to incomplete documentation, incorrect information, weak justification of content, or applying under an unsuitable pathway. Under Canadian law, CRS scores, incorrect analysis, and poor document alignment can often create issues.',
                'order' => 5
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['title' => $faq['title']],
                [
                    'description' => $faq['description'],
                    'status' => 1,
                    'order' => $faq['order']
                ]
            );
        }

        $this->command->info('Homepage FAQs have been updated successfully!');
    }
}

