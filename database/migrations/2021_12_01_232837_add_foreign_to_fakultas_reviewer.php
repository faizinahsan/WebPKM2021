<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToFakultasReviewer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_dosen_reviewer', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('fakultas')->change()->nullable();
            $table->foreign('fakultas')->references('id')->on('tb_fakultas')
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
        Schema::table('tb_dosen_reviewer', function (Blueprint $table) {
            //
        });
    }
}
