<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn()=>auth()->check()?redirect()->route('dashboard'):redirect()->route('login'))->name('home');

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'showLogin'])->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('login.store');
    Route::get('/register',[AuthController::class,'showRegister'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('register.store');
    Route::get('/auth/google',[AuthController::class,'google'])->name('auth.google');
});

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/portfolio',[PortfolioController::class,'index'])->name('dashboard.portfolio');
    Route::post('/portfolio',[PortfolioController::class,'store'])->name('dashboard.portfolio.store');
    Route::delete('/portfolio/{portfolio}',[PortfolioController::class,'destroy'])->name('dashboard.portfolio.destroy');
    Route::get('/profile',[ProfileController::class,'edit'])->name('dashboard.profile');
    Route::put('/profile',[ProfileController::class,'update'])->name('dashboard.profile.update');
});

Route::get('/portfolio/{user:username}',[PublicPortfolioController::class,'show'])->name('portfolio.public');
