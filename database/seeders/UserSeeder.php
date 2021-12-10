<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $password = Hash::make('test12345');
        // Dosen Pendamping
        User::create([
            'name'=>"Mahasiswa Reviewer Test 1",
            'email'=>$faker->email,
            'password'=>$password,
            'role_id'=>3,
        ]);
    }
}
