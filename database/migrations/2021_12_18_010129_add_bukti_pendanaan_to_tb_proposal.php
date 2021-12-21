<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiPendanaanToTbProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_proposal', function (Blueprint $table) {
            $table->string('file_bukti_pendanaan')->after('id_file_revisi_reviewer')->nullable();
            $table->string('file_bukti_path')->after('file_bukti_pendanaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_proposal', function (Blueprint $table) {
            //
        });
    }
}
