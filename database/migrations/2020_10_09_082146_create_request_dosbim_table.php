<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestDosbimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_request_dosbim', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('npm_mahasiswa')->nullable();
            $table->bigInteger('nip_pendamping')->nullable();
            $table->boolean('status')->nullable();

            $table->foreign('npm_mahasiswa')->references('npm_mahasiswa')->on('tb_mahasiswa')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip_pendamping')->references('nip_pendamping')->on('tb_dosen_pendamping')
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
        Schema::dropIfExists('tb_request_dosbim');
    }
}
