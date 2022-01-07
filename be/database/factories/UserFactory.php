<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hoTen' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'taiKhoan' => $this->faker->lexify('user-??????'),
            'matKhau' => app('hash')->make('123456'),
            'soDt' => $this->faker->phoneNumber(),
            'maNhom' => 'GP01',
            'maLoaiNguoiDung' => 'KhachHang',
        ];
    }
}
