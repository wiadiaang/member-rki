<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('kategori/list', [\App\Http\Controllers\kategoriController::class,'data'])->name('kategori.list');
Route::get('kategori/delete/{id}', [\App\Http\Controllers\kategoriController::class,'destroy'])->name('kategori.delete');
Route::resource('kategori', \App\Http\Controllers\kategoriController::class);
