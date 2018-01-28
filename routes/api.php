<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([/*'middleware'=>'auth:api',*/'namespace'=>'API'], function()
{
    Route::resource('users','UserController');
    Route::resource('users/{user_id}/events','Users\EventsController');
    Route::resource('users/{id}/profile','Users\ProfileController');
    Route::resource('users/{id}/funds','Users\FundsController');
    Route::resource('blog-posts','BlogPostController');
    Route::resource('event-posts','EventPostController');
});
