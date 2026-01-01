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
        // Deactivate Kottayam location (set status to 0) as the office is closed
        \DB::table('locations')
            ->where('location', 'Kottayam')
            ->orWhere('location', 'like', '%Kottayam%')
            ->update(['status' => 0]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reactivate Kottayam location if needed
        \DB::table('locations')
            ->where('location', 'Kottayam')
            ->orWhere('location', 'like', '%Kottayam%')
            ->update(['status' => 1]);
    }
};
