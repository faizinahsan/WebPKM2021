<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifikasiToRiwayatBimbingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_riwayat_bimbingan', function (Blueprint $table) {
            //
            $table->boolean('verifikasi')->after('nip_pendamping')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_riwayat_bimbingan', function (Blueprint $table) {
            //
        });
    }
}
