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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/card', function () {
    return view('card');
});

Route::get('/route', function () {
    return view('route');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/articles', function () {
    return view('articles');
});

Route::get('/country', 'CountryController@getCountryData');

Route::get('/keyword', 'KeywordController@getKeywordView');

Route::get('/getPagination','KeywordController@getPagination')->name('getPagination');

Route::post('/addKeyword', 'KeywordController@addKeywordData')->name('addKeyword');

Route::post('/updateKeyword', 'KeywordController@updateKeywordData')->name('updateKeyword');

Route::post('/deleteKeyword', 'KeywordController@deleteKeywordData')->name('deleteKeyword');

Route::post('/card', 'CardController@getCardData');

Route::post('/addArticle', 'ArticleController@addArticleData')->name('addArticle');

Route::post('/updateArticle', 'ArticleController@updateArticleData')->name('updateArticle');

Route::post('/deleteArticle', 'ArticleController@deleteArticleData')->name('deleteArticle');

Route::get('/test1','KeywordController@test1');

Route::get('/test2','KeywordController@test2');

Route::get('/test3','KeywordController@test3');

Route::post('/test3','KeywordController@test3');

Route::get('/cache','KeywordController@cache');

Route::get('/api', function () {
    return view('api');
});

