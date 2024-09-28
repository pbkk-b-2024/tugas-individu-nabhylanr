<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MembershipController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
	Route::get('register', 'register')->name('register');
	Route::post('register', 'registerSimpan')->name('register.simpan');

	Route::get('login', 'login')->name('login');
	Route::post('login', 'loginAksi')->name('login.aksi');

	Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
	return view('/auth/login');
});

Route::middleware('auth')->group(function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::controller(MenuController::class)->prefix('menu')->group(function () {
		Route::get('', 'index')->name('menu');
		Route::get('tambah', 'tambah')->name('menu.tambah');
		Route::post('tambah', 'simpan')->name('menu.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('menu.edit');
		Route::post('edit/{id}', 'update')->name('menu.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('menu.hapus');
	});
	
	Route::get('/menu/cari', [MenuController::class, 'search'])->name('menu.search');


	Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
		Route::get('', 'index')->name('kategori');
		Route::get('tambah', 'tambah')->name('kategori.tambah');
		Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('kategori.edit');
		Route::post('edit/{id}', 'update')->name('kategori.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('kategori.hapus');
	});

	Route::controller(OrderController::class)->prefix('order')->group(function () {
		Route::get('', 'index')->name('order');
	});

	Route::controller(MembershipController::class)->prefix('membership')->group(function () {
		Route::get('', 'index')->name('membership');
		Route::get('tambah', 'tambah')->name('membership.tambah');
		Route::post('tambah', 'simpan')->name('membership.tambah.simpan');
		Route::get('hapus/{id}', 'hapus')->name('membership.hapus');
	});

	Route::get('/kategori/cari', [KategoriController::class, 'search'])->name('kategori.search');
	
	Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
	Route::post('/profile/update', [AuthController::class, 'profileUpdate'])->name('profile.update');
});

