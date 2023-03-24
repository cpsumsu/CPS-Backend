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

Route::get('/events', 'EventController@index')
    ->name('events');

Route::get('/events/{id}', 'EventController@show')
    ->whereNumber('id')
    ->name('eventById');

Route::get('/metaverse_quotes', "WebDevHackathonController@index")
    ->name("metaverse_quotes");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
