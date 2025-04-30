<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LiteratureController;

Route::resource('literatures', LiteratureController::class);

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
Route::post('/library/store-type', [LibraryController::class, 'storeType'])->name('library.storeType');
Route::post('/library/store-category', [LibraryController::class, 'storeCategory'])->name('library.storeCategory');
Route::post('/library/store-literature', [LibraryController::class, 'storeLiterature'])->name('library.storeLiterature');
Route::delete('/library/destroy-type/{id}', [LibraryController::class, 'destroyType'])->name('library.destroyType');
Route::delete('/library/destroy-category/{id}', [LibraryController::class, 'destroyCategory'])->name('library.destroyCategory');
Route::delete('/library/destroy-literature/{id}', [LibraryController::class, 'destroyLiterature'])->name('library.destroyLiterature');
