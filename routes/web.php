<?php

use Illuminate\Support\Facades\Route;
use App\Article;
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
    $articles = Article::orderBy('created_at')->take(2)->get();
    $title = 'Simple Blog';

    return view('index', [
        'articles' => $articles,
        'title' => $title
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/article', function () {
    return view('article');
});

Route::post('/articles', 'ArticlesController@store');
Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
