<?php

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
    Route::get('/home', [
        'uses' => 'HomeController@getDashboard',
        'as' => 'home'
    ]);
    
    Route::get('/batch/{batch_id}', [
        'uses' => 'HomeController@getBatch',
        'as' => 'batch'
    ]);
    Route::get('/deletebatch/{batch_id}', [
        'uses' => 'HomeController@deleteBatch',
        'as' => 'deletebatch'
    ]);
    Route::get('/exportpdf', [
        'uses' => 'HomeController@getExportPDF',
        'as' => 'exportpdf'
    ]);
    Route::post('/exportbulkpdf', [
        'uses' => 'HomeController@postExportBulkPDF',
        'as' => 'exportbulkpdf'
    ]);
    Route::get('/importexcel', [
        'uses' => 'MyexcelController@importExport',
        'as' => 'importexcel.get'
    ]);
    Route::post('/importexcel', [
        'uses' => 'MyexcelController@import_salary_sheet',
        'as' => 'importexcel.post'
    ]);
    Route::get('/deletentry/{tblid}', [
        'uses' => 'HomeController@deletePayslip',
        'as' => 'deletentry'
    ]);
});