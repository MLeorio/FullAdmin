<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('alreadyLogged')->group(function(){
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAct'])->name('log');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('isLogin')->group(function(){
    
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/lost', [HomeController::class, 'lost'])->name('lost');
    Route::get('/fund', [HomeController::class, 'fund'])->name('fund');
    Route::get('/info/{annonce}', [HomeController::class, 'info'])->name('info');
    Route::put('/notice/update/{annonce}', [HomeController::class, 'update'])->name('update');
    Route::get('/publier/{annonce}', [HomeController::class, 'publish'])->name('publish');
    Route::get('/terminate/{annonce}', [HomeController::class, 'done'])->name('done');
});
