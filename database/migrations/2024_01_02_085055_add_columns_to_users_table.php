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
    Schema::table('users', function (Blueprint $table) {
      $table->string('gender', 100)->nullable();
      $table->date('dob')->nullable();
      $table->bigInteger('secondary_contact_number')->nullable();
      $table->text('current_address')->nullable();
      $table->text('permanent_address')->nullable();
      $table->text('national_id')->nullable();
      $table->text('id_file_name')->nullable();
      $table->text('id_file_path')->nullable();
      $table->text('photo_name')->nullable();
      $table->text('photo_path')->nullable();
      $table->text('signature_name')->nullable();
      $table->text('signature_path')->nullable();
      $table->text('thumb_name')->nullable();
      $table->text('thumb_path')->nullable();
      $table->string('highest_qualification', 200)->nullable();
      $table->string('institute_name', 200)->nullable();
      $table->string('year_of_graduation', 200)->nullable();
      $table->string('field_of_study', 200)->nullable();
      $table->text('certificate')->nullable();
      $table->text('how_you_hear')->nullable();
      $table->text('why_join_us')->nullable();
      $table->text('why_consider_you')->nullable();
      $table->text('specific_skills')->nullable();
      $table->boolean('job_application')->default(1);
      $table->string('source')->default('Job Application')->nullable();
      $table->unsignedBigInteger('created_by')->nullable();
      $table->foreign('created_by')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      //
    });
  }
};
