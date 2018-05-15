<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJorongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jorong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nagari_id')->unsigned();
            $table->string('nama');
            $table->double('luas_wilayah')->nullable();
            $table->timestamps();

            $table->foreign('nagari_id')->references('id')->on('nagari')->onDelete('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jorong');
    }
}
