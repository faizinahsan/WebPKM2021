<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbRiwayatCoaching extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_riwayat_coaching', function (Blueprint $table) {
            //
            $table->boolean('verifikasi')->after('nip_reviewer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_riwayat_coaching', function (Blueprint $table) {
            //
        });
    }
}
