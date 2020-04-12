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
    //CRUD News
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::match(['get','post'],'/news/create', 'NewsController@create')->name('news.create');
    Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit');
    Route::post('/news/update/{news}', 'NewsController@update')->name('news.update');
    Route::get('/news/destroy/{news}', 'NewsController@destroy')->name('news.destroy');

    //CRUD Category
    Route::get('/category/index', 'CategoryController@index')->name('category.index');

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
    Route::get('/One/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as' => 'category.'
    ], function() {
        Route::get('/categories', 'CategoryController@index')->name('index');
        Route::get('/category/{name}', 'CategoryController@show')->name('show');
    });
});

Route::view('/vue', 'vue')->name('vue');

Auth::routes();


