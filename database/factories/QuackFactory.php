<?php
namespace Database\Factories;

use App\Models\Quack;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuackFactory extends Factory
{
    protected $model = Quack::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'contenido' => fake()->sentence(12),
        ];
    }
}
