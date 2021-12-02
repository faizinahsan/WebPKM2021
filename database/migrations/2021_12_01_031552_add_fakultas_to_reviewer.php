<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFakultasToReviewer extends Migration
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
            $table->string('fakultas')->nullable()->after('nip_reviewer');
            $table->string('reviewer_picture')->nullable()->after('fakultas');
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
