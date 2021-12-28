<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'npm_anggota'=>140810170001,
            'nama_anggota'=>'test_anggota',
            'npm_mahasiswa'=>140810160032
        ];
    }
}
