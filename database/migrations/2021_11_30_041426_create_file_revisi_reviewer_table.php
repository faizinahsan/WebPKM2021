<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileRevisiReviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_file_revisi_reviewer', function (Blueprint $table) {
            $table->id();
            $table->string('file_revisi');
            $table->string('file_path');
            $table->bigInteger('nip_reviewer');
            $table->bigInteger('npm_mahasiswa');
            $table->foreign('npm_mahasiswa')->references('npm_mahasiswa')->on('tb_mahasiswa')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip_reviewer')->references('nip_reviewer')->on('tb_dosen_reviewer')
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
        Schema::dropIfExists('tb_file_revisi_reviewer');
    }
}
