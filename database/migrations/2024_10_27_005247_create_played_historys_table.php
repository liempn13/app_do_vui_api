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
            $table->foreignId('room_id')->nullable()->constrained('rooms', 'room_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('topic_id')->constrained('topics',  'topic_id');
            $table->foreignId('question_id')->constrained('questions', 'question_id');
            // $table->foreignId('option_id');
            $table->bigInteger('score');
            $table->integer('player_quantity')->default(1);
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
