<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/tasks/index', [App\Http\Controllers\TaskController::class, 'index'])->name('index');

Route::prefix('tasks')->as('tasks.')->controller(TaskController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
    Route::delete('destroy', 'destroy')->name('destroy');
});
