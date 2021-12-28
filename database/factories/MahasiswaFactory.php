<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'npm_mahasiswa'=>140810160032,
            'nip_pendamping'=>null,
            'nip_reviewer'=>null,
            'users_id'=>null
        ];
    }
}
