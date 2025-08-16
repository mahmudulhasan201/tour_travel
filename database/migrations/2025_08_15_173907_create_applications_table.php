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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_category_id')->constrained('job_categories'); // jobCategory
            $table->string('phone', 20); // phone
            $table->string('name'); // name
            $table->string('email'); // email
            $table->string('address')->nullable(); // address
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // gender
            $table->date('dob')->nullable(); // dob
            $table->string('avatar')->nullable(); // avatar
            $table->string('passport_no')->nullable(); // passportNo
            $table->string('nationality'); // nationality
            $table->string('current_country'); // currentCountry
            $table->string('english_course')->nullable(); // englishCourse
            $table->integer('experience_year')->nullable(); // experienceYear
            $table->string('cv')->nullable(); // cv
            $table->string('video_link')->nullable(); // videoLink
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
