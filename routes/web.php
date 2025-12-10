<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("index");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/download-report', [PdfController::class, 'downloadExistingPdf'])->name('report.download');

Route::get('/news', [NoticiaController::class, 'index'])->name('noticias');
Route::get('/news/new', [NoticiaController::class, 'create'])->name('addnews');
Route::post('/news', [NoticiaController::class, 'store'])->name('storenews');
Route::get('/news/delete/{id}', [NoticiaController::class, 'destroy'])->name('deletenews');
Route::get('/news/edit/{id}', [NoticiaController::class, 'edit'])->name('editnews');
Route::post('/news/{id}', [NoticiaController::class, 'update'])->name('updatenews');

Route::get('/sobre', function () {
    return view('about');
})->name("sobre");

require __DIR__.'/auth.php';
