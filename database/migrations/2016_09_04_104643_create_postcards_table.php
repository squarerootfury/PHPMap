<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('postcards', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();

            $table->string('username');
            $table->string('city');
            $table->string('country');
            $table->string('path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('postcards');
    }
}
