<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('videos', function (Blueprint $table) {
        $table->id();
        $table->string('video_file')->nullable();
        $table->string('youtube_url')->nullable();
        $table->string('title');
        $table->string('artist');
        $table->string('album')->nullable();
        $table->year('year')->nullable();
        $table->string('category')->nullable();
        $table->string('thumbnail')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
