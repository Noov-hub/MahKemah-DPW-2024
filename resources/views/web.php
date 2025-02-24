<?php

use App\Models\Bag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home', ['bags' => Bag::all()]);
    // return view('welcome');
});
Route::get('/details/{id}', function ($id) {
    $bag =  Bag::find($id);
    return view('details', ['bag' => $bag]);
    // return view('welcome');
});
Route::get('', function () {
    return view('home', ['bags' => Bag::all()]);

    // return view('welcome');
});
use App\Http\Controllers\ControlerOrder;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/langsung', [ControlerOrder::class, 'showConfirmation'])->name('langsung');
Route::post('/konfirmasi', [ControlerOrder::class, 'handleConfirmation'])->name('konfirmasi');
Route::get('', function () {
    return view('home', [
        'nama' => 'Nunu',
        'umur' => 20,
        'role' => 'bocil random',
        'rolelain' => ['customer', 'manager', 'admin']
    ]);
    // return view('welcome');
});

Route::view('/admin', 'admin');