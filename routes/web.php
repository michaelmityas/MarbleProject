<?php

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

Route::get('/', function () {
    return view('home');
});

Route::resource('/factories', 'FactoryController');

Route::get('/factories/create', 'FactoryController@create');

Route::get('/editFac/{id}', 'FactoryController@edit');

Route::get('/delFac/{id}', 'FactoryController@destroy');

Route::post('/updateFac/{id}', 'FactoryController@update');

Route::resource('/employees', 'EmployeesController');

Route::get('/attendance', 'EmployeesController@show');

Route::post('attendance/checkAttendance', 'EmployeesController@storeAttend');

Route::get('/attendanceDur', 'EmployeesController@showAttendDur');

Route::post('/attendanceDur/getAttendance', 'EmployeesController@getAttendance');

Route::get('/loan', 'EmployeesController@addLoan');

Route::post('/storeLoan', 'EmployeesController@storeLoan')->name('employees.storeLoan');

Route::get('/deduct', 'EmployeesController@addDeduct');

Route::post('/storeDeduct', 'EmployeesController@storeDeduct')->name('employees.storeDeduct');

Route::resource('/customers', 'CustomerController');

Route::resource('/expenses', 'ExpenseController');



Route::get('/suppliers', function () {
    return view('suppliers');
});

Route::get('/works', function () {
    return view('works');
});

Route::resource('/factories', 'FactoryController');

Route::get('/factories/create', 'FactoryController@create');

Route::get('/editFac/{id}', 'FactoryController@edit');

Route::get('/delFac/{id}', 'FactoryController@destroy');

Route::post('/updateFac/{id}', 'FactoryController@update');


//Suppliers routes
Route::resource('/suppliers', 'SupplierController');

Route::get('/suppliers/create', 'SupplierController@create');

Route::get('/editSup/{id}', 'SupplierController@edit');

Route::get('/deleteSup/{id}', 'SupplierController@destroy');

Route::post('/updateSup/{id}', 'SupplierController@update');

//get sawns blocks only
Route::get('/supplierss/{name}', 'SupplierController@getBlocksData');
//get all block of specific users
Route::get('/supplierssall/{name}', 'SupplierController@getAllBlocksData');

Route::resource('/works', 'WorksController');

Route::get('works/create', 'WorksController@create');

Route::get('works/blockscode/{id}', 'WorksController@getBlockCode');

Route::get('works/blockedit/{id}', 'WorksController@showBlockEdit');

Route::post('/works/updateblockdetails/{id}', 'WorksController@updateBlock');

Route::get('/works/deleteblock/{id}', 'WorksController@destroyBlock');

//route l locker

Route::get('/locker', function(){
    return view('locker.show');
})->name('money');

Route::post('/locker/get', 'LockerController@locker')->name('getMoney');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
