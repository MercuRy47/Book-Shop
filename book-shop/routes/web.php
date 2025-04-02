<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreController;

// Login
Route::get('/login', [LoginController::class, 'index']);

// Register
Route::get('/register', [RegisterController::class, 'index']);

// Store
Route::get('/store', [StoreController::class, 'store']);
Route::get('/book/detail/{id}', [StoreController::class, 'detail'])->name('book.details');
Route::get('/storage', [StoreController::class, 'storage']);
// Insert
Route::get('/add', [StoreController::class, 'add']);
Route::post('/book/insert', [StoreController::class, 'insert'])->name('add');
// Edit
Route::get('/book/edit/{id}', [StoreController::class, 'edit'])->name('edit');
Route::put('/book/update/{id}', [StoreController::class, 'edit_action'])->name('update');
// Delete
Route::delete('/book/delete/{id}', [StoreController::class, 'delete'])->name('delete');

// Home Page
Route::get('/', function () {
    return view('pages.index');
});
