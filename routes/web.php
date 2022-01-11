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

Route::get('register', "GpaController@register")->name("register");
Route::post('register', "GpaController@registerProcess")->name("register.new");
Route::get('login', "GpaController@login")->name("login");
Route::post('login', "GpaController@loginCheck")->name("login.auth");

Route::get("cgpa", "GpaController@cgpa")->name("cgpa");
