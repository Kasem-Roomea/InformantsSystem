<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['guest'] ] , function (){
    Route::get('/', function () {
        return view('auth.login');
    });

});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth'] ] , function (){

    //#############################################Home Route####################################################
    Route::get('/home', 'HomeController@index')->name('home');
    //#############################################Informants Route##############################################
    Route::resource('Informants', 'informantsController');
    //###############################################Classes Route###############################################
    Route::resource('Classes', 'classesController');
    //###############################################SamplesBasic Route###############################################
    Route::view('Samples', 'livewire.ShowSamples')->name('Samples');
    //###############################################RouteExport And Report Samples#############################
    Route::resource('ExportReport', 'ExportReportController');
    Route::post('ReportDate', 'ExportReportController@ReportDate')->name('ReportDate');
    //###############################################Start Permeation Role User###############################################
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});


