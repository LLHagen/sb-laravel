<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FeedbackController;

Route::get('/', [ArticleController::class, 'index'])->name('articles.list');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contacts', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/contacts', [FeedbackController::class, 'store'])->name('feedback.store');

Route::prefix('admin')->group(function () {
    Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedback.list');
});
