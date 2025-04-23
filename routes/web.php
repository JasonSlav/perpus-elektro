<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiteratureController;

Route::resource('literatures', LiteratureController::class);

Route::get('/', function () {
    return view('welcome');
});
