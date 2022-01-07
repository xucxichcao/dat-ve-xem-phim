<?php

namespace Database\Factories;

use App\Models\Phim;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PhimFactory extends Factory
{
    protected $model = Phim::class;

    public function definition(): array
    {
        $name = $this->faker->words(3, true);
        $date = $this->faker->date('Y-m-d');
        $time = $this->faker->time('H:i:s');
        $datetime = $date . 'T' .  $time;

        return [
            'tenPhim' => $name,
            'biDanh' => Str::kebab($name),
            'trailer' => 'https://youtu.be/nW948Va-l10',
            'hinhAnh' => 'http://localhost:8888/hinhanh/movie.jpg',
            'moTa' => $this->faker->paragraph(),
            'dangChieu' => $this->faker->boolean(),
            'ngayKhoiChieu' => $datetime,
            'danhGia' => $this->faker->randomDigit(),
        ];
    }
}
