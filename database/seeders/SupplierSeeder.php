<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Supplier::create([
            'name' => 'Supplier A',
            'contact_info' => 'supplierA@example.com',
            'created_by' => 1,
        ]);

        \App\Models\Supplier::create([
            'name' => 'Supplier B',
            'contact_info' => 'supplierB@example.com',
            'created_by' => 1,
        ]);

        \App\Models\Supplier::create([
            'name' => 'Supplier C',
            'contact_info' => 'supplierC@example.com',
            'created_by' => 1,
        ]);
    }
}
