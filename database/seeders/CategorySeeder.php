<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Kategori 1',
            'description' => 'Ini adalah sebuah kalimat deskriptif dari kategori.',
            'created_by' => 1,
        ]);

        Category::create([
            'name' => 'Kategori 2',
            'description' => 'Ini adalah deskripsi untuk kategori kedua.',
            'created_by' => 1,
        ]);

        Category::create([
            'name' => 'Kategori 3',
            'description' => 'Deskripsi singkat untuk kategori ketiga.',
            'created_by' => 1,
        ]);

        Category::create([
            'name' => 'Kategori 4',
            'description' => 'Penjelasan untuk kategori keempat.',
            'created_by' => 1,
        ]);

        Category::create([
            'name' => 'Kategori 5',
            'description' => 'Deskripsi kategori kelima yang informatif.',
            'created_by' => 1,
        ]);
    }
}
