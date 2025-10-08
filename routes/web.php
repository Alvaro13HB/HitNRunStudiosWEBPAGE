<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("index");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/noticias', function () {
    return view('news');
})->name("noticias");

Route::get('/sobre', function () {
    return view('about');
})->name("sobre");

Route::get('/newsletter', function () {
    return view('newsletter');
})->name("newsletter");

require __DIR__.'/auth.php';
