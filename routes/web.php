<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('', 'WelcomeController');

// Menu routes
Route::get('menu/edit/{url}', 'MenuController@edit')->name('menu.edit');
Route::post('menu/update', 'MenuController@update')->name('menu.update');
Route::get('menu/priority-up/{url}', 'MenuController@priorityUp')->name('menu.priority-up');
Route::get('menu/priority-down/{url}', 'MenuController@priorityDown')->name('menu.priority-down');
Route::get('menu/display/{url}', 'MenuController@display')->name('menu.display');
Route::get('menu/title-page/{url}', 'MenuController@titlePage')->name('menu.title-page');
Route::get('menu/delete/{url}', 'MenuController@destroy')->name('menu.delete');
Route::resource('menu', 'MenuController');

// Article routes
Route::get('article/edit/{url}', 'ArticleController@edit')->name('article.edit');
Route::post('article/update', 'ArticleController@update')->name('article.update');
Route::get('article/published/{url}', 'ArticleController@published')->name('article.published');
Route::get('article/delete/{url}', 'ArticleController@destroy')->name('article.delete');
Route::resource('article', 'ArticleController');

// User routes
Route::get('user/permissions-up/{nick}', 'UserController@permissionsUp')->name('user.permissions-up');
Route::get('user/permissions-down/{nick}', 'UserController@permissionsDown')->name('user.permissions-down');
Route::resource('user', 'UserController')->name('get','user.index');

Auth::routes(['verify' => true]);
