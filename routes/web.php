<?php
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;


Route::redirect('/', '/login');


Route::view('/about', 'about')->name('about');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.collect');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', \App\Http\Middleware\PreventBack::class])->group(function () {
    Route::get('/dashboard', [PortfolioController::class, 'index'])->name('dashboard');
     Route::post('/portfolios/preview', [PortfolioController::class, 'preview'])->name('portfolios.preview');
    Route::resource('portfolios', PortfolioController::class)->except(['index']);

});



?>