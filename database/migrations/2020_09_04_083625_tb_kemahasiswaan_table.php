<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbKemahasiswaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_kemahasiswaan', function (Blueprint $table) {
            //
            $table->bigInteger('nip_reviewer')->after('nip_kemahasiswaan');
            $table->unsignedBigInteger('users_id')->after('nip_reviewer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_kemahasiswaan', function (Blueprint $table) {
            //
        });
    }
}
