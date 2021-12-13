<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;
use App\Models\Kategori;

class InitialTablesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::create([
            'fakultas_name'=>'FH'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FEB'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FK'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FMIPA'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FAPERTA'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FAPET'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FIKOM'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FKEP'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FPIK'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FTIP'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FARMASI'
        ]);
        Fakultas::create([
            'fakultas_name'=>'FTG'
        ]);
        Fakultas::create([
            'fakultas_name'=>'PSIKOLOGI'
        ]);

    }
}
