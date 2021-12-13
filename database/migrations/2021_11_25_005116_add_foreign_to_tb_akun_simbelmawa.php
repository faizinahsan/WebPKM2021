<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToTbAkunSimbelmawa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_akun_simbelmawa', function (Blueprint $table) {
            //
            // $table->bigInteger('npm_mahasiswa')->change();
            // DB::statement('ALTER TABLE tb_akun_simbelmawa ALTER COLUMN 
            // npm_mahasiswa TYPE integer USING (npm_mahasiswa)::integer');
            $table->foreign('npm_mahasiswa')->references('npm_mahasiswa')->on('tb_mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_akun_simbelmawa', function (Blueprint $table) {
            //
        });
    }
}
