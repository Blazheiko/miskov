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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/personnel',              ['as' => 'personnel',        'uses' => 'PersonnelController@personnel']);
Route::get('/personnel/create',       ['as' => 'personnel.create', 'uses' => 'PersonnelController@create']);
Route::post('/personnel/add',         ['before' => 'csrf','as' => 'personnel.add', 'uses' => 'PersonnelController@add']);
Route::get('/personnel/{personnel}/show',   ['as' => 'personnel.show',   'uses' => 'PersonnelController@show']);
Route::get('/personnel/{personnel}/edit',   ['as' => 'personnel.edit',   'uses' => 'PersonnelController@edit']);
Route::post('/personnel/{personnel}/update',['before' => 'csrf','as' => 'personnel.store',   'uses' => 'PersonnelController@update']);

Route::resource ('listPersonnel','ListPersonnelController',['except' => ['create']]);
Route::get('/listPersonnel/{id}/create',['as' => 'listPersonnel.create', 'uses' => 'ListPersonnelController@create']);

Route::resources([  'specialty'=>'SpecialtyController',
                    'product'=>'ProductController',
                    'workingShift'=>'WorkingShiftController',
                     'storage'=>'StorageController']);


//,
//    'listPersonnel'=>'ListPersonnelController'
