<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//lists
Route::get('/list','App\Http\Controllers\ArticleController@index');

//post
Route::post('/add','App\Http\Controllers\ArticleController@store');
//single list
Route::get('/list/{id}','App\Http\Controllers\ArticleController@show');
//delete
Route::delete('/list/{id}','App\Http\Controllers\ArticleController@destroy');
//edit
Route::put('/update','App\Http\Controllers\ArticleController@store');