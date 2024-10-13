<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaymentController;
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

	Route::controller(PaymentController::class)->prefix('payment')->group(function () {
		Route::get('', 'index')->name('payment');
		Route::get('tambah', 'tambah')->name('payment.tambah');
		Route::post('tambah', 'simpan')->name('payment.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('payment.edit');
		Route::post('edit/{id}', 'update')->name('payment.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('payment.hapus');
	});

	Route::controller(OutletController::class)->prefix('outlets')->group(function () {
		Route::get('', 'index')->name('outlets');
		Route::get('tambah', 'tambah')->name('outlets.tambah');
		Route::post('tambah', 'simpan')->name('outlets.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('outlets.edit');
		Route::post('edit/{id}', 'update')->name('outlets.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('outlets.hapus');
	});

	Route::controller(OrderController::class)->prefix('order')->group(function () {
		Route::get('', 'index')->name('order');
	});

	Route::controller(CartController::class)->prefix('cart')->group(function () {
		Route::get('', 'index')->name('cart');
		Route::post('/cart/tambah/{menuId}', 'tambah')->name('cart.tambah');
		Route::post('/cart/tambah', 'simpan')->name('cart.simpan');
		Route::delete('/cart/hapus/{id}', 'hapus')->name('cart.hapus');
		Route::post('/cart/apply-discount', 'applyDiscount')->name('cart.applyDiscount');
		Route::post('/cart/cancelDiscount', 'cancelDiscount')->name('cart.cancelDiscount');
	});

	Route::controller(MembershipController::class)->prefix('membership')->group(function () {
		Route::get('', 'index')->name('membership');
		Route::get('tambah', 'tambah')->name('membership.tambah');
		Route::post('tambah', 'simpan')->name('membership.tambah.simpan');
		Route::get('hapus/{id}', 'hapus')->name('membership.hapus');
	});

	Route::controller(DiscountController::class)->prefix('discount')->group(function () {
		Route::get('', 'index')->name('discount');
		Route::get('tambah', 'tambah')->name('discount.tambah');
		Route::post('tambah', 'simpan')->name('discount.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('discount.edit');
		Route::post('edit/{id}', 'update')->name('discount.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('discount.hapus');
	});

	Route::controller(ReviewController::class)->prefix('review')->group(function () {
		Route::get('', 'index')->name('review');
		Route::get('tambah', 'tambah')->name('review.tambah');
		Route::post('tambah', 'simpan')->name('review.tambah.simpan');
		Route::get('hapus/{id}', 'hapus')->name('review.hapus');
	});

	Route::get('/kategori/cari', [KategoriController::class, 'search'])->name('kategori.search');
	Route::get('/discount/cari', [DiscountController::class, 'search'])->name('discount.search');
	Route::get('/outlets/cari', [OutletController::class, 'search'])->name('outlets.search');
	Route::get('/payment/cari', [PaymentController::class, 'search'])->name('payment.search');
	
	Route::controller(AuthController::class)->prefix('profile')->group(function () {
		Route::get('', 'profile')->name('profile');
		Route::post('update', 'update')->name('profile.update');
		Route::delete('delete', 'delete')->name('profile.delete');
	});
});

