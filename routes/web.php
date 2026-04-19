<?php

use App\Http\Controllers\{DashboardController, Question, QuestionController};
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/', function () {
    if (app()->isLocal()) {
        auth()->loginUsingId(1);

        return redirect('/dashboard');
    }
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

Route::post('/question/like/{question}', Question\LikeController::class)->name('question.like');

Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');

require __DIR__ . '/settings.php';
