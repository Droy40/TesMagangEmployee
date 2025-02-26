<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('/employee')->name('employee.')->group(function () {
//     Route::get('/', [EmployeeController::class, 'index'])->name('index');
//     Route::get('/{id}', [EmployeeController::class, 'show'])->name('show');
//     Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [EmployeeController::class, 'update'])->name('update');
//     Route::get('/create', [EmployeeController::class, 'create'])->name('create');
//     Route::post('/', [EmployeeController::class, 'store'])->name('store');
//     Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('destroy');
// })->middleware('auth');

Route::resource('/employee',EmployeeController::class)->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
