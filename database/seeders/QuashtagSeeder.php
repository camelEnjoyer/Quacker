<?php

namespace Database\Seeders;

use App\Models\Quashtag;
use Illuminate\Database\Seeder;

class QuashtagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'laravel',
            'php',
            'webdev',
            'backend',
            'quacker',
            'hito1',
        ];

        foreach ($tags as $tag) {
            Quashtag::create([
                'name' => $tag,
            ]);
        }
    }
}
