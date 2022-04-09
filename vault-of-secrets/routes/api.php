<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

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
// Route::resource('password', 'PasswordController');
Route::get('/passwords', "App\Http\Controllers\PasswordController@index"); // List Passwords
Route::post('passwords', "App\Http\Controllers\PasswordController@store"); // Create Passwords
Route::get('passwords/{id}', "App\Http\Controllers\PasswordController@show"); // Detail of Passwords
Route::put('passwords/{id}', "App\Http\Controllers\PasswordController@update"); // Update Passwords
Route::delete('passwords/{id}', "App\Http\Controllers\PasswordController@destroy"); //Delete Passwords

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
