<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {

   
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.list');
    Route::get('/expenses/add', [ExpenseController::class, 'add'])->name('expense.add');
    Route::post('/expenses/save', [ExpenseController::class, 'store'])->name('expense.save');
    Route::get('/expenses/view/{id}', [ExpenseController::class, 'view'])->name('expense.view');

    Route::get('/expenses/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::post('/expenses/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/expenses/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.delete');

});
