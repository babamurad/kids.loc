<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            'bg-red',
            'bg-green',
            'bg-blue',
            'bg-yellow',
        ];

        foreach ($colors as $color) {
            Color::create(['color' => $color]);
        }
    }
}
