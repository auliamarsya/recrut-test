<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController; 
use App\Http\Controllers\EmployeesController; 

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompaniesController::class);
    Route::resource('employees', EmployeesController::class);
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    //company
    Route::get('/list-company', 'CompaniesController@index')->name('list.company');
    Route::get('/add-company', 'CompaniesController@create')->name('create.company');
    Route::post('/store-company', 'CompaniesController@store')->name('store.company');
    Route::get('/edit-company/{id}', 'CompaniesController@edit');
    Route::post('/update-company', 'CompaniesController@update')->name('update.company');
    Route::post('/get-company','EmployeesController@getCompanies')->name('company.getCompany');
    
    //employee
    Route::get('/employee', 'EmployeesController@index')->name('employee');
    Route::get('/add-employee', 'EmployeesController@create')->name('create.employee');
    Route::post('/store-employee', 'EmployeesController@store')->name('store.employee');
});
