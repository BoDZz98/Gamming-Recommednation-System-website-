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
        Schema::create('list_games', function (Blueprint $table) {
            $table->integer('list_id');
            $table->integer('game_id');
            $table->timestamps();
            $table->primary(['list_id', 'game_id']);
            $table->foreign('list_id')->references('list_id')->on('user_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_games');
    }
};
