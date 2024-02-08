<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [BlogController::class, 'index'])->name('blog.index');

Route::get('/blog/yeni', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/olustur', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/duzenle/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/duzenle/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::post('/blog/sil/{blog}', [BlogController::class, 'destroy'])->name('blog.delete');

Route::get('/kategoriler', [CategoryController::class, 'index'])->name('category.index');
Route::get('/kategori/yeni', [CategoryController::class, 'create'])->name('category.create');
Route::post('/kategori/yeni', [CategoryController::class, 'store'])->name('category.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
