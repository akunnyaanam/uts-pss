<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            Item::create([
            'name' => 'Item ' . $i,
            'description' => 'Description for Item ' . $i,
            'price' => rand(1000, 100000),
            'quantity' => rand(1, 100),
            'category_id' => rand(1, 5),
            'supplier_id' => rand(1, 3),
            'created_by' => 1, 
            ]);
        }
    }
}
