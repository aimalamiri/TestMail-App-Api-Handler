<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/emails', [MailController::class, 'index'])->middleware(['auth', 'verified'])->name('emails');
Route::get('/emails/fetch', [MailController::class, 'fetch'])->middleware(['auth', 'verified'])->name('emails.fetch');
Route::get('/emails/{email}', [MailController::class, 'show'])->middleware(['auth', 'verified'])->name('emails.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
