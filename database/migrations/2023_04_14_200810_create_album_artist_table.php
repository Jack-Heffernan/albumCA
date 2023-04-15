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
        Schema::create('album_artist', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('artist_id')->unsigned();
            $table->unsignedBigInteger('album_id')->unsigned();
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('album_id')->references('id')->on('albums')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_artist');
    }
};
