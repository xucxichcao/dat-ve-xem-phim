<?php

namespace Database\Factories;

use App\Models\Rap;
use Illuminate\Database\Eloquent\Factories\Factory;

class RapFactory extends Factory
{
    protected $model = Rap::class;

    public function definition(): array
    {
        static $number = 1;
        return [
            'maCumRap' => 'cns-quoc-thanh',
            'tenRap' => sprintf('Rạp %d', $number++),
        ];
    }
}
