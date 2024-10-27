<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('played_historys', function (Blueprint $table) {
            $table->id('ID');
            $table->string('room_id');
            $table->string('user_id');
            $table->string('topic_id');
            $table->string('question_set_id');
            $table->string('question_id');
            $table->string('option_id');
            $table->string('score');
            $table->integer('player_quatity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('played_historys');
    }
};