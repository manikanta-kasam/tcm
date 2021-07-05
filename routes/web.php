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

Route::get('/','ModuleController@getSections');


Route::post('/addModule','ModuleController@addModule');
Route::get('/addTestCase','ModuleController@addTestCase');

Route::delete('/deleteTestCase','ModuleController@deleteTestCase');

Route::get('/getTestCases','ModuleController@getTestCases');

// Route::get('/getSections','ModuleController@getSections');

Route::get('/addSectionPopUp','ModuleController@addSectionPopUp');
