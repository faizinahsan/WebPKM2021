<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRevisiReviewerToFileRevisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_file_revisi', function (Blueprint $table) {
           $table->unsignedBigInteger('id_file_revisi_reviewer')->after('npm_mahasiswa')->nullable();
            $table->foreign('id_file_revisi_reviewer')->references('id')->on('tb_file_revisi_reviewer')
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
        Schema::table('tb_file_revisi', function (Blueprint $table) {
            //
        });
    }
}
