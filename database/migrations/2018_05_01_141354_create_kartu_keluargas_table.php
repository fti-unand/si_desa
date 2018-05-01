<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jorong_id')->unsigned();
            $table->integer('no_kk');
            $table->string('alamat');
            $table->date('tanggal_kk')->nullable();
            $table->timestamps();

            $table->foreign('jorong_id')->references('id')->on('jorong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartu_keluarga');
    }
}
