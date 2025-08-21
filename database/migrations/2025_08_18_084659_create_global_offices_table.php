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
        Schema::create('global_offices', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('city');
            $table->string('office_address');
            $table->string('map_link')->nullable();
            $table->string('video_link')->nullable();
            $table->json('contacts')->nullable(); // Store multiple contacts as JSON
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_offices');
    }
};
