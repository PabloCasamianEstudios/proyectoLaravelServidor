<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('index');
})->name('home');;

// Mis rutas

Route::view('/about', 'about')->name('about');
Route::view('/news', 'news')->name('news');


Route::resource('miembros', MiembroController::class);

// Rutas por defecto

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("lang/{language}", LanguageController::class)->name('language');

// CONTACTO
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


require __DIR__.'/auth.php';
