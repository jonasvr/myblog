<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    // http://stackoverflow.com/questions/34548061/laravel-5-2-auth-not-working
    Route::get('/blogs',                        ['as' => 'all',      'uses' => 'BlogController@allBlogs']);
    Route::get('/blogs/subject/{subject_id}',  ['as' => 'subject',  'uses' => 'BlogController@subjectBlogs']);

    Route::group(['middleware' => 'auth'], function () {
      Route::get('/create',         ['as' => 'create',   'uses'=>'BlogController@create']);
      Route::post('/create/post',   ['as' => 'addBlog',  'uses'=>'BlogController@addBlog']);
      Route::get('/update/{id}',   ['as' => 'getupdate',  'uses'=>'BlogController@getUpdate']);
      Route::post('/update',            ['as' => 'update',  'uses'=>'BlogController@update']);

    });

});
