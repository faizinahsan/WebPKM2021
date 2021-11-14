<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTimelineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_timeline', function (Blueprint $table) {
            $table->id('id_timeline');
            $table->dateTime('datetime');
            $table->string('nama_timeline');
            $table->string('deskripsi');
            $table->bigInteger('nip_kemahasiswaan');

            $table->foreign('nip_kemahasiswaan')->references('nip_kemahasiswaan')->on('tb_kemahasiswaan')
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
        Schema::dropIfExists('tb_timeline');
    }
}
