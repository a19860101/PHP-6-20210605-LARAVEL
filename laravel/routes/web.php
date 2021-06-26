<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function(){
    return view('test');
});
// Route::get('/qwerty',function(){
//     return 'qwerty';
// });
// Route::get('/qwerty/{id}/{user}','TestController@qwerty');

Route::get('/post','PostController@index')->name('post.index');
Route::get('/post/create','PostController@create')->name('post.create')->middleware('auth');
Route::post('/post','PostController@store')->name('post.store')->middleware('auth');
Route::get('/post/{post}','PostController@show')->name('post.show');
Route::delete('/post/{post}','PostController@delete')->name('post.delete')->middleware('auth');
Route::get('/post/{post}/edit','PostController@edit')->name('post.edit')->middleware('auth');
Route::put('/post/{post}','PostController@update')->name('post.update')->middleware('auth');
Route::post('/upload','PostController@upload');
Route::get('/post-category/{category}','PostController@postWithCategory')->name('post.category');
Route::get('/post-user/{user}','PostController@postWithUser')->name('post.user');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/logout/success',function(){
    Auth::logout();
    return view('logout');
})->name('logout.success');

// Route::post('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::resource('/category','CategoryController');
