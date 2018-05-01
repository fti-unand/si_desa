<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->integer('pekerjaan_id')->unsigned();
            $table->integer('penghasilan')->nullable();
            $table->timestamps();

            $table->foreign('penduduk_id')->references('id')->on('penduduk');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaan_penduduk');
    }
}
