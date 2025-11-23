<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index']);

// Hiển thị danh sách sách
Route::get('/books', [BooksController::class, 'index'])->name('books.index');

// Form thêm sách
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');

// Lưu sách mới
Route::post('/books', [BooksController::class, 'store'])->name('books.store');

// Form sửa sách
Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');

// Cập nhật sách
Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');

// Xóa sách
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');
