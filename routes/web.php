<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Date;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/select', function () {
    return view('index');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::middleware(['auth'])->get('/todos', [TodoController::class, 'index'])->name('todos');

Route::middleware(['auth'])->group(function () {
    Route::get('todos/add', [TodoController::class, 'create'])->name('todos_add');

    Route::get('todos/t', [TodoController::class, 'show']);

    Route::post('todos/store', [TodoController::class, 'store'])->name('todos_store');

    Route::post('todos/edit/{id}', [TodoController::class, 'edit'])->name('todos_edit');

    Route::get('todos/edit/{id}', [TodoController::class, 'edit']);

    Route::middleware('nullstate')->post('todos/update/{id}', [TodoController::class, 'update'])->name('todos_update');

    Route::post('todos/delete/{id}', [TodoController::class, 'destroy'])->name('todos_delete');

    Route::post('/todos/done/{id}/{state}', [TodoController::class, 'done'])->name('todos_done');
});

require __DIR__ . '/auth.php';
