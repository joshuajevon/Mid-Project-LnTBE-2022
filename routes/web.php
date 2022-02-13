<?php

use App\Http\Controllers\LibraryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', [LibraryController::class, 'add'])->name('add');

Route::post('/addBook', [LibraryController::class, 'addBook'])->name('addBook');

Route::get('/view', [LibraryController::class, 'view'])->name('view');

Route::get('/update-book/{id}', [LibraryController::class, 'updateBook'])->name('updateBook');

Route::patch('/update/{id}', [LibraryController::class, 'update'])->name('update');

Route::delete('/delete/{id}',[LibraryController::class, 'delete'])->name('delete');

Route::get('/cari', [LibraryController::class, 'cari'])->name('cari');
