<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKemahasiswaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_kemahasiswaan', function (Blueprint $table) {
            
            $table->foreign('nip_reviewer')->references('nip_reviewer')->on('tb_dosen_reviewer')
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
        //
    }
}
