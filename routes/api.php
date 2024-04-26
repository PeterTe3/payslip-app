<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SalaryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
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
});
