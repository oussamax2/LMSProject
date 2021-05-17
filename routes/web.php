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

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('Campus');
Route::get('/partners', [App\Http\Controllers\HomeController::class, 'partners'])->name('partners');
Route::get('/pro_training', [App\Http\Controllers\HomeController::class, 'pro_training'])->name('pro_training');
Route::get('/catg_courses', [App\Http\Controllers\HomeController::class, 'catg_courses'])->name('catg_courses');
Route::get('/singlcourse', [App\Http\Controllers\HomeController::class, 'singlcourse'])->name('singlcourse');


/*
 * Backend admin Routes
 * Namespaces indicate folder structure
 */

Route::group(['prefix' => 'admin','middleware' => ['web', 'auth','role:admin']], function () {
    Route::get('/', [App\Http\Controllers\BackController::class, 'admin'])->name('admin');
    Route::resource('countries', App\Http\Controllers\countriesController::class);
    Route::resource('states', App\Http\Controllers\statesController::class);
    Route::resource('cities', App\Http\Controllers\citiesController::class);
    Route::resource('registerations', App\Http\Controllers\registerationsController::class);
    
    Route::resource('tags', App\Http\Controllers\tagsController::class);
    Route::resource('courses', App\Http\Controllers\coursesController::class);
    Route::resource('courseTags', App\Http\Controllers\course_tagController::class);
    Route::resource('categories', App\Http\Controllers\categoriesController::class);
    Route::resource('sessions', App\Http\Controllers\sessionsController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('subcategories', App\Http\Controllers\subcategorieController::class);
    Route::resource('companies', App\Http\Controllers\companiesController::class);

    

});


Route::get('verifcompany/{id}', 'App\Http\Controllers\companiesController@update_companyreqst')->name('verifcompany');

/*
 * dashboard compny  Routes
 * Namespaces indicate folder structure
 */

Route::group(['prefix' => 'dashboard','middleware' => ['web', 'auth','role:company']], function () {



});


/*
 * dashboard user  Routes
 * Namespaces indicate folder structure
 */

Route::group(['prefix' => 'dashboard','middleware' => ['web', 'auth','role:user']], function () {
    //--------
});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');





