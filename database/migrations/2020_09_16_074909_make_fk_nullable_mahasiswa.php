<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFkNullableMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_mahasiswa', function (Blueprint $table) {
            $table->bigInteger('nip_pendamping')->change()->nullable();
            $table->bigInteger('nip_reviewer')->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_mahasiswa', function (Blueprint $table) {
            //
        });
    }
}
