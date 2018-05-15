<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_keluarga_id')->unsigned();
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_meninggal')->nullable();
            $table->integer('jenis_kelamin');
            $table->integer('kewarganegaraan')->nullable();
            $table->string('photo')->nullable();
            $table->integer('status_perkawinan_id')->unsigned();
            $table->integer('status_penduduk_id')->unsigned();
            $table->integer('agama_id')->unsigned();
            $table->integer('hubungan_keluarga_id')->unsigned();
            $table->integer('ayah_id')->unsigned();
            $table->integer('ibu_id')->unsigned();
            $table->timestamps();

            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluarga');
            $table->foreign('status_penduduk_id')->references('id')->on('status_penduduk');
            $table->foreign('status_perkawinan_id')->references('id')->on('status_perkawinan');
            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('hubungan_keluarga_id')->references('id')->on('hubungan_keluarga');
            $table->foreign('ayah_id')->references('id')->on('penduduk');
            $table->foreign('ibu_id')->references('id')->on('penduduk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}
