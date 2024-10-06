<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\KategoriController;

Route::prefix('menu')->controller(MenuController::class)->group(function () {
    Route::get('', 'index')->name('api.menu');
    Route::post('tambah', 'simpan')->name('api.menu.tambah.simpan');
    Route::put('edit/{id}', 'update')->name('api.menu.update');
    Route::delete('hapus/{id}', 'hapus')->name('api.menu.hapus');
    Route::get('search', 'search')->name('api.menu.search');
});

Route::prefix('kategori')->controller(KategoriController::class)->group(function () {
    Route::get('', 'index')->name('api.kategori');
    Route::post('tambah', 'simpan')->name('api.kategori.tambah.simpan');
    Route::put('edit/{id}', 'update')->name('api.kategori.update');
    Route::delete('hapus/{id}', 'hapus')->name('api.kategori.hapus');
    Route::get('search', 'search')->name('api.kategori.search');
});


