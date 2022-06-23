<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairwiseScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairwise_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criteria1_id');
            $table->unsignedBigInteger('criteria2_id');
            $table->foreign('criteria1_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->foreign('criteria2_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->double('score');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pairwise_scores');
    }
}
