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
// if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
//     error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// }


Route::get('/', 'PostsController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/users/{name}/{id}', function($name, $id){
//     return 'Usuário: ' .$name. ' ID: ' .$id;
// });


// Route::get('/hello', function () {
//     return '<h1>Hello World</h1>';
// });


