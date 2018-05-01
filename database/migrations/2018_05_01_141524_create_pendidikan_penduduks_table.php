<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenjang_id')->unsigned();
            $table->integer('penduduk_id')->unsigned();
            $table->string('nama_institusi')->nullable();
            $table->integer('tahun_mulai')->nullable();
            $table->integer('tahun_selesai')->nullable();
            $table->timestamps();

            $table->foreign('jenjang_id')->references('id')->on('jenjang_pendidikan');
            $table->foreign('penduduk_id')->references('id')->on('penduduk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan_penduduk');
    }
}
