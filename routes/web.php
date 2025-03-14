<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;
// Định nghĩa routes resource

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
//Route::resource('books', BookController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $books = Book::all();// Lấy tất cả sách từ cơ sở dữ liệu
    //return view('books.index', compact('books')); /
    return view('dashboard', compact('books'));
   // Route::resource('books', BookController::class);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/books', BookController::class);
});

require __DIR__.'/auth.php';
