<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiRiwayatForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_riwayat_bimbingan', function (Blueprint $table) {
            //
            $table->foreign('npm_mahasiswa')->references('npm_mahasiswa')->on('tb_mahasiswa')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip_pendamping')->references('nip_pendamping')->on('tb_dosen_pendamping')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
