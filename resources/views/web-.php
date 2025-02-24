<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'nama' => 'Nunu',
        'umur' => 20,
        'role' => 'bocil random',
        'rolelain' => ['customer', 'manager', 'admin']
    ]);
    // return view('welcome');
});
Route::get('/home', function () {
    return view('home', [
        'nama' => 'Nunu',
        'umur' => 20,
        'role' => 'bocil random',
        'rolelain' => ['customer', 'manager', 'admin']
    ]);
    // return view('welcome');
});

Route::view('/welcome', 'welcome');
Route::view('/admin', 'admin');
Route::view('/warn', 'warn');
