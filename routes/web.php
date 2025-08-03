<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/workers');
Route::prefix('workers')->name('worker.')->group(function() {
    Route::get('/', [WorkerController::class, 'index'])->name('index');
    Route::get('/create', [WorkerController::class, 'create'])->name('create');
    Route::post('/', [WorkerController::class, 'store'])->name('store');
    Route::get('/{worker}', [WorkerController::class, 'show'])->name('show');
    Route::get('/{worker}/edit', [WorkerController::class, 'edit'])->name('edit');
    Route::patch('/{worker}', [WorkerController::class, 'update'])->name('update');
    Route::delete('/{worker}', [WorkerController::class, 'destroy'])->name('destroy');
});