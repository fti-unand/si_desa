<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePejabatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nagari_id')->unsigned();
            $table->integer('jabatan_id')->unsigned();
            $table->string('nama');
            $table->string('sk_no')->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->date('mulai_tanggal')->nullable();
            $table->date('sampai_tanggal')->nullable();
            $table->string('file_sk')->nullable();
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
        Schema::dropIfExists('pejabat');
    }
}
