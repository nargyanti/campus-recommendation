<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utbk_score_id');
            $table->foreign('utbk_score_id')->references('id')->on('utbk_scores')->onDelete('cascade');
            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->enum('option', [1, 2]);
            $table->double('score');            
            $table->integer('ranking');  
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
        Schema::dropIfExists('recommendations');
    }
}
