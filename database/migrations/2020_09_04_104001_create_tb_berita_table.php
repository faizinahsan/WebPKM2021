<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string('judul_berita');
            $table->string('keterangan_berita');
            $table->string('gambar_berita');
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
        Schema::dropIfExists('tb_berita');
    }
}
