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
Route::match(['get', 'post'], '/profile/', 'ProfileController@update')->name('updateProfile');

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
    'as' => 'admin.',
    'middleware' => ['auth', 'isAdmin']
], function () {
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::get('/', 'NewsController@index')->name('news.index');

    //CRUD Resources
    Route::group([
        'as' => 'resources.'
    ], function () {
        Route::get('/resources', 'ResourcesController@index')->name('index');
        Route::get('/resources/destroy/{resources}', 'ResourcesController@destroy')->name('destroy');
        Route::match(['get', 'post'], '/resources/create', 'ResourcesController@create')->name('create');
    });

    //CRUD News
    Route::group([
        'as' => 'news.'
    ], function () {
        Route::match(['get', 'post'], '/news/create', 'NewsController@create')->name('create');
        Route::get('/news/edit/{news}', 'NewsController@edit')->name('edit');
        Route::post('/news/update/{news}', 'NewsController@update')->name('update');
        Route::get('/news/destroy/{news}', 'NewsController@destroy')->name('destroy');
    });

    //CRUD Category
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/category/index', 'CategoryController@index')->name('index');
        Route::match(['get', 'post'], '/category/create', 'CategoryController@create')->name('create');
        Route::get('/category/edit/{category}', 'CategoryController@edit')->name('edit');
        Route::post('/category/update/{category}', 'CategoryController@update')->name('update');
        Route::get('/category/destroy/{category}', 'CategoryController@destroy')->name('destroy');
    });

    //Users
    Route::group([
        'as' => 'users.'
    ], function () {
        Route::get('/users/index', 'UserController@index')->name('index');
        Route::post('/users/update/{user}', 'UserController@update')->name('update');
    });

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
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/One/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/categories', 'CategoryController@index')->name('index');
        Route::get('/category/{name}', 'CategoryController@show')->name('show');
    });
});

Route::view('/vue', 'vue')->name('vue');

Auth::routes();

Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');

//Auth::routes(['register' => false]);
