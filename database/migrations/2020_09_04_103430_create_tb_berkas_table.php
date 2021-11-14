<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_berkas', function (Blueprint $table) {
            $table->id('id_berkas');
            $table->string('judul_berkas');
            $table->string('file_berkas');
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
        Schema::dropIfExists('tb_berkas');
    }
}
