<?php
namespace Database\Seeders;

use App\Models\Quack;
use Illuminate\Database\Seeder;

class QuackSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos 20 quacks de ejemplo
        Quack::factory()->count(20)->create();
    }
}
