<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/contact', [PostController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function() {
    Route::get('post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::post('post/modify', [PostController::class, 'modify'])->name('post.modify');
});

Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
