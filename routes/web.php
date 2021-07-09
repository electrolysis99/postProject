<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Post
Route::resource('posting', App\Http\Controllers\PostingController::class);
Route::get('posting/check_slug', [PostingController::class, 'checkSlug'])->name('posting.check_slug');
Route::post('posting/store', [PostingController::class, 'store'])->name('posting.store');
Route::post('posting/{id}/update', [PostingController::class, 'update'])->name('posting.update');
Route::post('posting/{id}', [PostingController::class, 'destroy'])->name('posting.destroy');
