<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiForeignMahasiswaUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_mahasiswa', function (Blueprint $table) {
    
            // $table->foreign('nip_dosenpendamping')->references('nip_pendamping')->on('tb_dosen_pendamping')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('nip_dosenreviewer')->references('nip_reviewer')->on('tb_dosen_reviewer')
            //     ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::table('tb_mahasiswa', function(Blueprint $table) {
            $table->bigInteger('nip_dosenpendamping')->change();
        });
    }
}
