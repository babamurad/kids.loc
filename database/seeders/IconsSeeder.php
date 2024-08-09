<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directory = 'images/categories';
        // Указываем путь к папке, где хранятся SVG файлы
        $directory = public_path('images/categories');

        // Получаем список всех файлов в папке
        $files = array_diff(scandir($directory), ['..', '.']);

        // Фильтруем, чтобы оставить только SVG файлы
        $svgFiles = array_filter($files, function($file) use ($directory) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'svg';
        });

        $icons = $svgFiles;

        foreach ($icons as $icon) {
            Icon::create(['icon' => $icon]);
        }
    }
}
