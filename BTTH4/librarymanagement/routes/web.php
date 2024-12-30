<?php
use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']); // Directly points to index method
Route::resource('books', BookController::class);
