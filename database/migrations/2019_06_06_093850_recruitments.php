<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recruitments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('recruitments', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->unsigned();
            $table->string('name');
            $table->string('company');
            $table->string('country');
            $table->string('email')->nullable(false)->unique()->index();
            $table->string('phone');
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
        Schema::dropIfExists('recruitments');
    }
}
