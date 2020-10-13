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

Route::get('/country', 'CountryController@getCountryData');

Route::get('/keyword', 'KeywordController@getKeywordView');

Route::get('/keywordSelect', 'KeywordController@updateKeywordData');

Route::get('/getKeywordData','KeywordController@index')->name('getKeywordData');

Route::get('/updateKeyword', 'KeywordController@updateKeywordData');

Route::post('/addKeyword', 'KeywordController@addKeywordData')->name('addKeyword');

Route::post('/updateKeyword', 'KeywordController@updateKeywordData')->name('updateKeyword');

Route::post('/deleteKeyword', 'KeywordController@deleteKeywordData')->name('deleteKeyword');

Route::post('/card', 'CardController@getCardData');
