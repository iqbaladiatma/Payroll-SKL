<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('attendances', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->date('date');
      $table->time('check_in');
      $table->time('check_out')->nullable();
      $table->string('status')->default('present'); // present, late, absent
      $table->text('notes')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('attendances');
  }
};
