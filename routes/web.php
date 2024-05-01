<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlowerController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

//トップページ
Route::get('/', [FlowerController::class, 'show_home'])->name('show_home');

//花診断ページ
Route::get('/find_your_flower', [FlowerController::class, 'show_question_page'])->name('show_flower');

//管理画面/質問
Route::get('/dashboard/register_product', [FlowerController::class, 'show_register_product'])->name('show_register_product');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
