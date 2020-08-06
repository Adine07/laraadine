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

Auth::routes();


Route::middleware('auth')->group(function(){
    
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::get('/guardians', 'GuardianController@index');
    Route::get('/guardians/create', 'GuardianController@create');
    Route::post('/guardians/store', 'GuardianController@store');
    Route::get('/guardians/edit/{id}', 'GuardianController@edit');
    Route::put('/guardians/update/{id}', 'GuardianController@update');
    Route::delete('/guardians/delete/{id}', 'GuardianController@delete');
    
    Route::get('/students', 'StudentController@index');
    Route::get('/students/create', 'StudentController@create');
    Route::post('/students/store', 'StudentController@store');
    Route::get('/students/edit/{id}', 'StudentController@edit');
    Route::put('/students/update/{id}', 'StudentController@update');
    Route::delete('/students/delete/{id}', 'StudentController@delete');
    
    Route::prefix('/admin')->namespace('Admin')->name('admin.')->group( function(){
        // Route::get('/users', 'UserController@index')->name('users.index');
        // Route::get('/users/create', 'UserController@create')->name('users.create');
        // Route::post('/users/store', 'UserController@store')->name('users.store');
        // Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
        // Route::put('/users/update/{id}', 'UserController@update')->name('users.update');
        // Route::delete('/users/delete/{id}', 'UserController@destroy')->name('users.destroy');
    
        Route::resource('/users', 'UserController');
    });
});



// Route::get('/login', 'AuthController@login');
// Route::get('/register', 'AuthController@register');
// Route::post('/registration-proccess', 'AuthController@registrationProccess');
// Route::post('/login-proccess', 'AuthController@loginProccess');
// Route::post('/logout', 'AuthController@logout');

Route::get('/loginnew', function () {
    return view('authentication.login');
});
