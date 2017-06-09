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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PageController@getIndex');
Route::get('blog/{slug}', ['uses'=>'PageController@getSingle', 'as'=>'blog.single'])
	->where('slug','[\w\d\-]+');
Route::get('blog', ['uses'=>'PageController@getArchive', 'as'=>'blog.archive']);

/*
Route::post('auth/login','Auth\LoginController@postLogin');
Route::get('auth/logout','Auth\LoginController@getLogout');

Route::get('auth/register','Auth\RegisterController@getRegister');
Route::post('auth/register','Auth\RegisterController@postRegister');
*/
Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController', ['except'=>['create']]);
Route::resource('tags', 'TagController', ['except'=>['create']]);

Route::get('contact', ['uses'=>'PageController@getContact', 'as'=>'contact.get'])->middleware('auth');
Route::post('contact', ['uses'=>'PageController@postContact', 'as'=>'contact.post'])->middleware('auth');