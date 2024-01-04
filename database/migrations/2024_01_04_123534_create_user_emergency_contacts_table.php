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
    Schema::create('user_emergency_contacts', function (Blueprint $table) {
      $table->id();
      $table->string('contact_name', 200);
      $table->string('relationship', 200);
      $table->string('contact_number', 20);
      $table->string('gender', 200);
      $table->date('dob');
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_emergency_contacts');
  }
};
