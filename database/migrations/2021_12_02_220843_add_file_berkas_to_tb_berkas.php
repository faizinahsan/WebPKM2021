<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileBerkasToTbBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_berkas', function (Blueprint $table) {
            //
            $table->string('file_berkas')->nullable()->after('judul_berkas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_berkas', function (Blueprint $table) {
            //
        });
    }
}
