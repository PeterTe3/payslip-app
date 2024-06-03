<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyexcelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('root');

Auth::routes();

// Dashboard section
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'getDashboard'])->name('home');
    
    Route::get('/batch/{batch_id}', [HomeController::class, 'getBatch'])->name('batch');
    Route::get('/deletebatch/{batch_id}', [HomeController::class, 'deleteBatch'])->name('deletebatch');
    Route::get('/exportpdf', [HomeController::class, 'getExportPDF'])->name('exportpdf');
    Route::post('/exportbulkpdf', [HomeController::class, 'postExportBulkPDF'])->name('exportbulkpdf');
    Route::get('/importexcel', [MyexcelController::class, 'importExport'])->name('importexcel.get');
    Route::post('/importexcel', [MyexcelController::class, 'import_salary_sheet'])->name('importexcel.post');
    Route::get('/deletentry/{tblid}', [HomeController::class, 'deletePayslip'])->name('deletentry');
});
