<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProposalFileRevisiToFileRevisiReviewer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_file_revisi_reviewer', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_file_proposal')->after('npm_mahasiswa')->nullable();
            $table->foreign('id_file_proposal')->references('id_file_proposal')->on('tb_proposal')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_file_revisi')->after('id_file_proposal')->nullable();
            $table->foreign('id_file_revisi')->references('id_file')->on('tb_file_revisi')
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
        Schema::table('tb_file_revisi_reviewer', function (Blueprint $table) {
            //
        });
    }
}
