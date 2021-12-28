<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RequestDosbim;

class RequestPendampingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = User::class;
    public function definition()
    {
        return [
            //
            'npm_mahasiswa'=>null,
            'nip_pendamping'=>null,
            'status'=>true //for testing true, not testing null
        ];
    }
}
