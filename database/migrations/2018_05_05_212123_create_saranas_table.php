<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaranasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nagari_id')->unsigned();
            $table->string('nama');
            $table->text('keterangan');
            $table->integer('tahun_bangun');
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
        Schema::dropIfExists('sarana');
    }
}
