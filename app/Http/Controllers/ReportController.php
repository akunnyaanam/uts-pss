<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // • Menampilkan daftar barang yang stoknya di bawah ambang batas tertentu (misalkan di bawah 5 unit).
    public function warningItemStock()
    {
        return Item::where('quantity', '<', 5)
            ->with([
                'admin',
                'category',
                'supplier'
            ])
            ->get()
            ->toResourceCollection();
    }

    // • Menampilkan laporan barang berdasarkan kategori tertentu.
    public function listItemsByCategory(Category $category)
    {
        return $category->items()
            ->with([
                'admin',
                'supplier',
                'category'
            ])
            ->get()
            ->toResourceCollection();
    }
}
