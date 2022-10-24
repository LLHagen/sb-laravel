<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {
        Route::get('feedbacks', [FeedbackController::class, 'index'])
            ->name('feedback.index');
        Route::resource('articles', AdminArticleController::class);
        Route::patch('articles/published/{article}', [AdminArticleController::class, 'articlesPublished'])
            ->name('articles.published');
});

Auth::routes();
