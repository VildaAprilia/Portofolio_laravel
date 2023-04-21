<?php

use App\Http\Controllers\tampilanController;
use App\Http\Controllers\pengaturanhalamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\halamanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [tampilanController::class, "index"]);

Route::redirect('home', 'dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::prefix('dashboard')->group(
    function(){
        Route::get('/', [halamanController::class, 'index']);
        Route::resource('halaman', halamanController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        Route::get('skill', [skillController::class,"index"])->name('skill.index');
        Route::post('skill', [skillController::class,"update"])->name('skill.update');
        Route::get('profile', [profileController::class,"index"])->name('profile.index');
        Route::post('profile', [profileController::class,"update"])->name('profile.update');
        Route::get('pengaturanhalaman', [pengaturanhalamanController::class,"index"])->name('pengaturanhalaman.index');
        Route::post('pengaturanhalaman', [pengaturanhalamanController::class,"update"])->name('pengaturanhalaman.update');
    }
);



