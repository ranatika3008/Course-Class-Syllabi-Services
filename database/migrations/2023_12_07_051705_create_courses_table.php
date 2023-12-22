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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('creator_user_id');
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('course_credit');
            $table->integer('lab_credit')->nullable();
            $table->enum('type', array('mandatory', 'elective'));
            $table->text('short_description')->nullable();
            $table->string('minimal_requirement', 1024)->nullable();
            $table->text('study_material_summary')->nullable();
            $table->text('learning_media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
