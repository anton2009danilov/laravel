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


Route::get('/', 'HomeController@index')->name('Home');

/*
|--------------------------------------------------------------------------
| Админка
|--------------------------------------------------------------------------
|
| Функции админа
|
*/
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::match(['get','post'],'/create', 'IndexController@create')->name('create');
    Route::get('/downloadImage', 'IndexController@downloadImage')->name('downloadImage');
    Route::get('/json', 'IndexController@json')->name('json');
});


/*
|--------------------------------------------------------------------------
| Новости
|--------------------------------------------------------------------------
|
| Страницы новостей
|
*/
Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function() {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/One/{id}', 'NewsController@show')->name('show');
    Route::group([
        'as' => 'category.'
    ], function() {
        Route::get('/categories', 'CategoryController@index')->name('index');
        Route::get('/category/{name}', 'CategoryController@show')->name('show');
    });
});

Route::view('/vue', 'vue')->name('vue');

Auth::routes();


