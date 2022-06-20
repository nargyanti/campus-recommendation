<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtbkScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utbk_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');            
            $table->integer('biologi');
            $table->integer('fisika');
            $table->integer('kimia');
            $table->integer('kmb');
            $table->integer('kpu');
            $table->integer('kua');
            $table->integer('matematika');
            $table->integer('ppu');            
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
        Schema::dropIfExists('utbk_scores');
    }
}
