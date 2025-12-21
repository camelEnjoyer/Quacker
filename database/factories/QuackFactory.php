<?php
namespace Database\Factories;

use App\Models\Quack;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuackFactory extends Factory
{
    protected $model = Quack::class;

    public function definition(): array
    {
        return [
            'user_nickname' => fake()->userName(),
            'contenido' => fake()->sentence(12),
        ];
    }
}
