<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;


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
        // $faker = Faker::create();
        // $password = Hash::make('123456');
        // //
        // User::create([
        //     'name'=>$faker->name,
        //     'email'=>$faker->email,
        //     'password'=>$password,
        //     'role_id'=>1,
        // ]);
    }
}
