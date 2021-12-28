<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDosenReviewerTable extends Migration
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
            $table->unsignedBigInteger('users_id')->nullable()->after('nip_reviewer');
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
        Schema::table('tb_dosen_reviewer', function (Blueprint $table) {
            //
        });
    }
}
