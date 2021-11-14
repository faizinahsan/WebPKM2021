<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFileRevisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_file_revisi', function (Blueprint $table) {
            $table->id('id_file');
            $table->string('file_revisi');
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
        Schema::dropIfExists('tb_file_revisi');
    }
}
