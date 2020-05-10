<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->string('title');
            $table->string('summary', 10000)->nullable();
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->string('video_url')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('duration')->nullable();
            $table->string('duration_string')->nullable();
            $table->dateTime('released_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
