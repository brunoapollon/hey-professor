<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::post('/question/store',[QuestionController::class, 'store'])->name('question.store');

require __DIR__ . '/settings.php';
