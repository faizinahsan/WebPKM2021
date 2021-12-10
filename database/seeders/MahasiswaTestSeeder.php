<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DosenPendamping;
use App\Models\Mahasiswa;
use App\Models\DosenReviewer;
use App\Models\AkunSimbelmawa;
use App\Models\FileRevisiReviewer;

class MahasiswaTestSeeder extends Seeder
{
    // Untuk Mahasiswa yang melakukan testing
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Nip 1981 untuk test
        // // Create Pendamping Test
        // DosenPendamping::create([
        //     'nip_pendamping'=>198101012015011001,
        //     'users_id'=>11,
        // ]);
        // // Create Reviewer Test
        // // 198201012015011001
        // DosenReviewer::create([
        //     'nip_reviewer'=> 198201012015011001,
        //     'fakultas_id'=>4,
        //     'reviewer_picture'=>"reviewerTest.jpg",
        //     'users_id'=> 12
        // ]);
        // Create Mahasiswa
        // Mahasiswa::create(['npm_mahasiswa'=>140810160032,
        // 'nip_pendamping'=>null,'nip_reviewer'=>null,'users_id'=>13]);
        // // Create 3 File Revisi Test
        // 
        
        // Create Akun Simbelmawa File Revisi Test
        AkunSimbelmawa::create([
            'username'=>'username_simbelmawa_test_1',
            'password'=>'password_simbelmawa_test_1',
            'npm_mahasiswa'=>140810160032
        ]);
    }
}
