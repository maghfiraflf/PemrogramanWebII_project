<?php

use Illuminate\Support\Facades\Route;


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
// Route::get('/', function (){
//     return view('index');
// });

Route::get('/create', function () {
    return view('books.create');
});



use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::resource('books', BookController::class);
Route::get('/riviewmu', [BookController::class, 'riview'])->name('books.riview');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');



// Route::resource('books', BookController::class);