<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LiteratureController;
use App\Http\Controllers\Auth\LoginController;

// Route::resource('literatures', LiteratureController::class);

Route::get('/', [LiteratureController::class, 'index'])->name('literatures.index');

Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
Route::post('/library/store-type', [LibraryController::class, 'storeType'])->name('library.storeType');
Route::post('/library/store-category', [LibraryController::class, 'storeCategory'])->name('library.storeCategory');
Route::post('/library/store-literature', [LibraryController::class, 'storeLiterature'])->name('library.storeLiterature');
Route::delete('/library/destroy-type/{id}', [LibraryController::class, 'destroyType'])->name('library.destroyType');
Route::delete('/library/destroy-category/{id}', [LibraryController::class, 'destroyCategory'])->name('library.destroyCategory');
Route::delete('/library/destroy-literature/{id}', [LibraryController::class, 'destroyLiterature'])->name('library.destroyLiterature');
Route::put('/library/update-type/{id}', [LibraryController::class, 'updateType'])->name('library.updateType');
Route::put('/library/update-category/{id}', [LibraryController::class, 'updateCategory'])->name('library.updateCategory');
Route::put('/library/update-literature/{id}', [LibraryController::class, 'updateLiterature'])->name('library.updateLiterature');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
