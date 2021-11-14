<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRiwayatCoachingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_riwayat_coaching', function (Blueprint $table) {
            $table->id('id_riwayat_coaching');
            $table->dateTime('tanggal');
            $table->string('hasil_diskusi');
            $table->bigInteger('npm_mahasiswa');
            $table->bigInteger('nip_reviewer');

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
        Schema::dropIfExists('tb_riwayat_coaching');
    }
}
