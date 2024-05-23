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

Route::get('login', function () {
    return view('auth.login'); // Se desarrolla más adelante
});

Route::get('logout', function () {
    return 'Logout usuario(**)';
});

Route::get('category', function () {
    return view('category.index');
});

Route::get('category/show/{id}', function () {
    return view('category.show');
});

Route::get('category/create', function () {
    return view('category.create');
});

Route::get('category/edit/{id}', function () {
    return view('category.edit');
});

