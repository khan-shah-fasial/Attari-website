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
        Schema::create('learnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('slug');
            $table->string('heading_pdf_title')->nullable();
            $table->string('pdf')->nullable();
            $table->string('schedule_title')->nullable();
            $table->string('testimonials_title')->nullable();
            $table->string('faq_title')->nullable();
            $table->string('faq')->nullable();
            $table->string('page')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_tests');
    }
};
