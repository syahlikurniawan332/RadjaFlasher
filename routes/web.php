<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/gallery', [HomePageController::class, 'gallery'])->name('gallery');
Route::get('/services', [HomePageController::class, 'services'])->name('services');
Route::get('/article', [HomePageController::class, 'article'])->name('article');
Route::get('/article/{id}', [HomePageController::class, 'getArticle'])->whereNumber('id')->name('article.show');
