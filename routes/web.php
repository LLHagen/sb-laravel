<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FeedbackController;

Route::get('/articles/tags/{tag}', [ArticleTagController::class, 'index'])
    ->name('articles.tags');
Route::get('/', [ArticleController::class, 'index'])
    ->name('articles.list');
Route::resource('articles', ArticleController::class);

Route::get('/about', [MainController::class, 'about'])
    ->name('about');
Route::get('/contacts', [FeedbackController::class, 'create'])
    ->name('feedback.create');
Route::post('/contacts', [FeedbackController::class, 'store'])
    ->name('feedback.store');

Route::prefix('admin')->group(function () {
    Route::get('feedbacks', [FeedbackController::class, 'index'])
        ->name('feedback.index');
});
