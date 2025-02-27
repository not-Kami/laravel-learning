<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CommentController;

// Route racine
Route::get('/', [GameController::class, 'index'])->name('home');

// Routes pour les jeux
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

// Routes pour les commentaires
Route::group(['prefix' => 'games/{game_id}/comments'], function () {
    Route::get('/', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/{comment}', [CommentController::class, 'show'])->name('comments.show');
    Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::post('games/{game_id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::view('/presentation', 'presentation')->name('presentation');