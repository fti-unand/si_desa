<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nagari_id')->unsigned();
            $table->string('judul');
            $table->date('tanggal_terbit');
            $table->text('isi');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('nagari_id')->references('id')->on('nagari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
}
