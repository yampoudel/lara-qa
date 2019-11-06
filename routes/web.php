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

//defining the route except show route 
Route::resource('questions', 'QuestionsController')->except('show');

//Here we are using the show route separately because we need to use slug instead of id  to make url seo friendly
Route::get('/questions/{slug}', 'QuestionsController@show')->name( 'questions.show' );
