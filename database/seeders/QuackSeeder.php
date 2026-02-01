<?php
namespace Database\Seeders;

use App\Models\Quack;
use App\Models\Quashtag;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuackSeeder extends Seeder
{
    public function run(): void
    {
        //Seleccionamos todos los ID de Quashtag y User
        $allQuashtagIds = Quashtag::pluck('id')->toArray();

        $allUserIds = User::pluck('id')->toArray();

        // Creamos 20 quacks, creamos una funcion 
        Quack::factory()->count(20)->create()->each(function ($quack) use ($allQuashtagIds, $allUserIds) {
            $quack->user_id = collect($allUserIds)->random();
            $quack->save();

            // Hacemos una coleccion con los quashtag y aplicamos un random que elija entre 1 a 3 quashtags
            $randomTags = collect($allQuashtagIds)->random(rand(1,3))->toArray();

            $quack->quashtags()->attach($randomTags);
        });
    }
}
