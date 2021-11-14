<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->bigInteger('npm_anggota');
            $table->string('nama_anggota');
            $table->bigInteger('npm_mahasiswa');

            $table->foreign('npm_mahasiswa')->references('npm_mahasiswa')->on('tb_mahasiswa')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tb_anggota');
    }
}
