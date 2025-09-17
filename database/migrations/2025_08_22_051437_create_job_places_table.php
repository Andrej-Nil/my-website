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
        Schema::create('job_places', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('profession');
            $table->date('start');
            $table->date('end')->nullable();
            $table->boolean('is_current_job')->nullable();
            $table->text('text')->nullable();
            $table->string('sort')->default(0);
            $table->boolean('is_display')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_works');
    }
};
