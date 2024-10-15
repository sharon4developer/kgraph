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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('second_image')->nullable();
            $table->string('intervention_image')->nullable();
            $table->string('second_intervention_image')->nullable();
            $table->string('third_image')->nullable();
            $table->string('third_intervention_image')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->string('alt_tag')->nullable()->default('k-graph');
            $table->string('second_alt_tag')->nullable()->default('k-graph');
            $table->string('third_alt_tag')->nullable()->default('k-graph');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
