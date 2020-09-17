<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use App\Models\Article;

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
    $articles = Article::latest()->take(2)->get();
    $title = 'Simple Blog';

    return view('index', [
        'articles' => $articles,
        'title' => $title
    ]);
});
Route::middleware('auth')->group(function () {
    Route::post('/articles', 'ArticlesController@store');
    Route::put('/articles/{article}', 'ArticlesController@update');
    Route::get('/articles/{article}/edit', 'ArticlesController@edit');
    Route::get('/articles/create', 'ArticlesController@create');
    Route::post('/comments', 'CommentsController@store');
});

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
