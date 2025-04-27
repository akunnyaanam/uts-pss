<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::resource('items', ItemController::class);
Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);

Route::get('warningItemStock', [ReportController::class, 'warningItemStock']);
Route::get('listItemsByCategory/{category}', [ReportController::class, 'listItemsByCategory']);