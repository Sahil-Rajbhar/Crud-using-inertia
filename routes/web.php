<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('employees', 'EmployeeController');

Route::post('/validate', 'EmailValidationController@validateEmail')->name('employees.validate_email');

Route::get('users/edit', 'UserController@create')->name('users.edit'); 

Route::post('/update/{id}', 'UserController@update')->name('users.update');

Route::post('/validate/user', 'EmailValidationController@validateUserEmail')->name('users.validate_email');