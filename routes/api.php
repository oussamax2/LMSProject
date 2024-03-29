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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});







Route::resource('countries', App\Http\Controllers\API\countriesAPIController::class);



Route::resource('states', App\Http\Controllers\API\statesAPIController::class);

Route::resource('cities', App\Http\Controllers\API\citiesAPIController::class);

Route::resource('registerations', App\Http\Controllers\API\registerationsAPIController::class);





Route::resource('courses', App\Http\Controllers\API\coursesAPIController::class);

Route::resource('categories', App\Http\Controllers\API\categoriesAPIController::class);

Route::resource('sessions', App\Http\Controllers\API\sessionsAPIController::class);

Route::resource('roles', App\Http\Controllers\API\RoleAPIController::class);


Route::resource('tags', App\Http\Controllers\API\tagAPIController::class);

Route::resource('subcategories', App\Http\Controllers\API\subcategorieAPIController::class);


Route::resource('companies', App\Http\Controllers\API\companiesAPIController::class);


Route::resource('contacts', App\Http\Controllers\API\ContactAPIController::class);

Route::resource('target_audiances', App\Http\Controllers\API\target_audianceAPIController::class);

Route::resource('messagings', App\Http\Controllers\API\messagingAPIController::class);

Route::resource('users', App\Http\Controllers\API\UserAPIController::class);

Route::resource('languages', App\Http\Controllers\API\languageAPIController::class);

Route::resource('subscribers', App\Http\Controllers\API\subscribersAPIController::class);