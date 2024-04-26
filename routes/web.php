<?php


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('welcome');
});

// Routes for employees
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

// Routes for salaries
Route::get('/salaries', [SalaryController::class, 'index']);
Route::get('/salaries/{id}', [SalaryController::class, 'show']);
Route::post('/salaries', [SalaryController::class, 'store']);
Route::put('/salaries/{id}', [SalaryController::class, 'update']);
Route::delete('/salaries/{id}', [SalaryController::class, 'destroy']);

Route::middleware('auth')->get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
