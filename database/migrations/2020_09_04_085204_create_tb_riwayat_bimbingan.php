<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRiwayatBimbingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_riwayat_bimbingan', function (Blueprint $table) {
            $table->id('id_riwayat_bimbingan');
            $table->dateTime('tanggal');
            $table->string('hasil_diskusi')->nullable();
            $table->bigInteger('npm_mahasiswa');
            $table->bigInteger('nip_pendamping')->nullable();
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
        Schema::dropIfExists('tb_riwayat_bimbingan');
    }
}
