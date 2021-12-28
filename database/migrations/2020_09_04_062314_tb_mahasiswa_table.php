<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_mahasiswa', function (Blueprint $table) {
            //
            $table->bigInteger('nip_pendamping')->nullable()->after('npm_mahasiswa');
            $table->bigInteger('nip_reviewer')->nullable()->after('nip_pendamping');
            $table->bigInteger('users_id')->nullable()->after('nip_reviewer');
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
            // $table->dropColumn('nip_dosenpendamping');
            // $table->dropColumn('nip_dosenreviewer');
            // $table->dropColumn('users_id');
        });
    }
}
