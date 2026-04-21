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
        Schema::create('activity_with_posts', function (Blueprint $table) {
            $table->id();
            $table->string('cookie_id');
            $table->string('ip_address');
            $table->integer('post_id');
            $table->integer('reaction')->default(0);
            $table->integer('viewing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_with_posts');
    }
};
