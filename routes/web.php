<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/tweets', "TweetController@index");
    Route::post('/tweets', "TweetController@store");
    Route::post('/tweets/{tweet}/like', 'TweetLikeController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikeController@destroy');

    Route::post('/@{user:username}/follow', 'FollowController@store')->name('follow');

    Route::get(
        '/@{user:username}/edit',
        'ProfileController@edit')
            ->name('profile.edit')
            ->middleware('can:edit,user');
    Route::patch(
        '/@{user:username}',
        'ProfileController@update')
            ->name('profile.update')
            ->middleware('can:edit,user');
    Route::get('/@{user:username}', 'ProfileController@show')->name('profile');

    Route::get('/explore', 'ExploreController@index')->name('explore');
});


Route::get('/@{user:username}', 'ProfileController@show')->name('profile');
