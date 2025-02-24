<?php

use App\Models\Bag;
use App\Models\Cart;
use App\Models\Shoe;
use App\Models\Tent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ControllerOrder;
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
    
    Route::get('/bag_details/{user_id}/{id}', function ($user_id, $id) {
        $bag = Bag::find($id);
        return view('bag_details', ['bag' => $bag, 'user_id' => $user_id]);
    })->name('bag_details');

    Route::get('/shoe_details/{user_id}/{id}', function ($user_id, $id) {
        $shoe = Shoe::find($id);
        return view('shoe_details', ['shoe' => $shoe, 'user_id' => $user_id]);
    })->name('shoe_details');

    Route::get('/tent_details/{user_id}/{id}', function ($user_id, $id) {
        $tent = Tent::find($id);
        return view('tent_details', ['tent' => $tent, 'user_id' => $user_id]);
    })->name('tent_details');
});

require __DIR__.'/auth.php';

Route::post('/bag_konfirmasi', [ControllerOrder::class, 'showBagConfirmation'])->name('bag_konfirmasi');
Route::post('/shoe_konfirmasi', [ControllerOrder::class, 'showShoeConfirmation'])->name('shoe_konfirmasi');
Route::post('/tent_konfirmasi', [ControllerOrder::class, 'showTentConfirmation'])->name('tent_konfirmasi');
// Route::post('/bag_konfirmasi', [ControllerOrder::class, 'showBagConfirmation'])->name('bag_konfirmasi');

Route::post('/konfirmasi_bag', [ControllerOrder::class, 'handleConfirmationbag'])->name('konfirmasi_bag');
Route::post('/konfirmasi_shoe', [ControllerOrder::class, 'handleConfirmationshoe'])->name('konfirmasi_shoe');
Route::post('/konfirmasi_tent', [ControllerOrder::class, 'handleConfirmationtent'])->name('konfirmasi_tent');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('home_guest', [
        'bags' => Bag::findWithStatus(1),
        'shoes' => Shoe::findWithStatus(1),
        'tents' => Tent::findWithStatus(1)
    ]);
});
Route::get('/admin', function () {
    return view('admin', [
        'bags' => Bag::findWithStatus(0),
        'shoes' => Shoe::findWithStatus(0),
        'tents' => Tent::findWithStatus(0),
        'carts' => Cart::findWithStatus(1)
    ]);
});
Route::post('/add-to-cart-bag', [CartController::class, 'addToCartbag'])->name('add-to-cart-bag');
Route::post('/add-to-cart-shoe', [CartController::class, 'addToCartshoe'])->name('add-to-cart-shoe');
Route::post('/add-to-cart-tent', [CartController::class, 'addToCarttent'])->name('add-to-cart-tent');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/create', [CartController::class, 'createCart'])->name('cart.create');
    Route::post('/cart/confirm', [CartController::class, 'confirmCart'])->name('cart.confirm');
    Route::post('/cart/remove-bag', [CartController::class, 'removeBag'])->name('cart.removeBag');
    Route::post('/cart/remove-shoe', [CartController::class, 'removeShoe'])->name('cart.removeShoe');
    Route::post('/cart/remove-tent', [CartController::class, 'removeTent'])->name('cart.removeTent');
});
Route::post('/langsung', [ControllerOrder::class, 'showbagConfirmation'])->name('langsung');
Route::post('/konfirmasi', [ControllerOrder::class, 'handleConfirmationbag'])->name('konfirmasi');

Route::get('/admin-verification', function () {
    return view('admin_verification');
});

Route::post('/admin-verification', function (Illuminate\Http\Request $request) {
    $password = $request->input('password');

    // Check hardcoded password
    if ($password === 'Adminniboss') {
        session(['admin_password_verified' => true]);
        return redirect()->intended('/admin');
    }

    return redirect('/')->with('error', 'Password salah!');
})->name('admin.verification.submit');

Route::post('/change-status/{id}', [ItemController::class, 'changeStatus'])->name('change.status');
Route::get('/admin', [ItemController::class, 'adminPage'])->name('admin.page');

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
