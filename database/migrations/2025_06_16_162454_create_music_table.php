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
    Schema::create('music', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('artist');
        $table->string('album')->nullable();
        $table->integer('year')->nullable();
        $table->string('genre')->nullable();
        $table->string('audio_file');
        $table->string('cover_image')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
