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
        Schema::create('user_lists_tables', function (Blueprint $table) {
            $table->integer('list_id')->primary();
            $table->timestamps();
            $table->string('list_name');
            $table->longText('list_description');
            $table->string('list_image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lists_tables');
    }
};
