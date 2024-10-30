<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eligibility_checks', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->text('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country_live')->nullable();
            $table->string('country_born')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('have_children')->nullable();
            $table->string('hear_about_canada')->nullable();
            $table->string('type_of_application')->nullable();
            $table->string('further_info')->nullable();
            $table->string('funds_available')->nullable();
            $table->string('highest_education_outside_can')->nullable();
            $table->string('country_of_studies')->nullable();
            $table->string('highest_education_inside_can')->nullable();
            $table->string('language_level_english')->nullable();
            $table->string('english_language_test')->nullable();
            $table->string('language_level_french')->nullable();
            $table->string('french_language_test')->nullable();
            $table->string('resume')->nullable();
            $table->string('main_industry')->nullable();
            $table->string('work_exp_outside_can')->nullable();
            $table->string('work_exp_inside_can')->nullable();
            $table->string('entitled_to_work')->nullable();
            $table->string('manage_business')->nullable();
            $table->string('temporary_foreign_worker')->nullable();
            $table->string('certificate_of_qualification')->nullable();
            $table->string('job_offer')->nullable();
            $table->string('family_relations_in_canada')->nullable();
            $table->string('refused_or_cancelled_visa')->nullable();
            $table->string('refused_admission')->nullable();
            // $table->string('refused_admission_border')->nullable();
            $table->string('partner_been_to_canada')->nullable();
            $table->string('overstayed_in_any_country')->nullable();
            $table->string('partner_previously_applied_for_visa')->nullable();
            $table->string('partner_previously_submitted_an_application')->nullable();
            $table->string('criminal_record')->nullable();
            $table->string('arrested')->nullable();
            $table->string('detained')->nullable();
            $table->string('nomination_certificate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eligibilty_checks');
    }
};
