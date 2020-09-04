<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbKemahasiswaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_kemahasiswaan', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('nip_dosenreviewer')->after('nip_kemahasiswaan');
            $table->unsignedBigInteger('users_id')->after('nip_dosenreviewer');

            $table->foreign('nip_dosenreviewer')->references('nip_reviewer')->on('tb_dosen_reviewer')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')
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
        Schema::table('tb_kemahasiswaan', function (Blueprint $table) {
            //
        });
    }
}
