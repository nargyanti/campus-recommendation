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
            $table->integer('biologi')->default(0);
            $table->integer('fisika')->default(0);
            $table->integer('kimia')->default(0);
            $table->integer('kmb')->default(0);
            $table->integer('kpu')->default(0);
            $table->integer('kua')->default(0);
            $table->integer('matematika')->default(0);
            $table->integer('ppu')->default(0);            
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
