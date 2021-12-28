<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DosenPendamping;

class DosenPendampingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = DosenPendamping::class;
    public function definition()
    {
        return [
            'nip_pendamping'=>198009112019011001,
            'users_id'=>1,
        ];
    }
}
