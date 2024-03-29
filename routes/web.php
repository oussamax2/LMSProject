<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Auth::routes(['verify' => true ,  'register' => false]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home0');
Route::get('/partners', [App\Http\Controllers\HomeController::class, 'partners'])->name('partners');
Route::get('/profilecompany/{id}', [App\Http\Controllers\HomeController::class, 'pro_training'])->name('profilecompany');
Route::get('/list_sessions', [App\Http\Controllers\HomeController::class, 'catg_courses'])->name('course');
Route::get('/registeruser', [App\Http\Controllers\HomeController::class, 'registeruser'])->name('registeruser');
Route::post('/register_user', [App\Http\Controllers\Auth\RegisterController::class, 'registeruser'])->name('register_user');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/confirmedregister', [App\Http\Controllers\HomeController::class, 'confirmedregister'])->name('confirmedregister');
Route::get('/detailcourse', [App\Http\Controllers\HomeController::class, 'detailcourse'])->name('detailcrs');
Route::get('/register_vendor', [App\Http\Controllers\HomeController::class, 'registervendor'])->name('register_vendor');
Route::post('/store_vendor', [App\Http\Controllers\Auth\RegisterController::class, 'registervendor'])->name('registervendor');
Route::get('sendcontact', [App\Http\Controllers\ContactController::class, 'sendcontact'])->name("sendcontact");
Route::get('/loginverif', [App\Http\Controllers\HomeController::class, 'loginverif'])->name("loginverif");
Route::get('/sitemap.xml', [App\Http\Controllers\HomeController::class, 'sitemap']);

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);



/** verification */

Route::get('/email/verify', function () {
    if( auth()->user()->email_verified_at)
    return redirect('/');
    else
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
 * Backend admin Routes
 * Namespaces indicate folder structure
 */

Route::group(['prefix' => 'admin','middleware' => ['web', 'auth','verified','role:admin']], function () {
    Route::get('/', [App\Http\Controllers\BackController::class, 'admin'])->name('admin');
    Route::resource('countries', App\Http\Controllers\countriesController::class);
    Route::resource('states', App\Http\Controllers\statesController::class);
    Route::resource('cities', App\Http\Controllers\citiesController::class);
    Route::resource('adminregisterations', App\Http\Controllers\registerationsController::class)->except(['create', 'store']);
    Route::resource('tags', App\Http\Controllers\tagController::class);
    Route::resource('admincourses', App\Http\Controllers\coursesController::class);
    Route::resource('courseTags', App\Http\Controllers\course_tagController::class);
    Route::resource('categories', App\Http\Controllers\categoriesController::class);
    Route::resource('adminsessions', App\Http\Controllers\sessionsController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('subcategories', App\Http\Controllers\subcategorieController::class);
    Route::resource('companies', App\Http\Controllers\companiesController::class)->except(['create', 'store']);
    Route::resource('contacts', App\Http\Controllers\ContactController::class)->except(['edit', 'update', 'create', 'store']);
    Route::get('verifcompany/{id}/{response}', [App\Http\Controllers\companiesController::class, 'update_companyreqst'])->name('verifcompany');
    Route::resource('targetAudiances', App\Http\Controllers\target_audianceController::class);
    Route::resource('messagings', App\Http\Controllers\messagingController::class);
    Route::resource('users', App\Http\Controllers\UserController::class)->except(['create', 'store']);
    Route::get('indexadmins', [App\Http\Controllers\adminController::class, 'indexadmins'])->name('indexadmins');
    Route::get('showadmins/{id}', [App\Http\Controllers\adminController::class, 'showadmins'])->name('showadmins');
    Route::delete('destroyadmins/{id}', [App\Http\Controllers\adminController::class, 'destroyadmins'])->name('destroyadmins');
    Route::get('createadmin', [App\Http\Controllers\adminController::class, 'createadmin'])->name('createadmin');
    Route::post('/storeadmin', [App\Http\Controllers\adminController::class, 'storeadmin'])->name('storeadmin');
    Route::resource('subscribers', App\Http\Controllers\subscribersController::class)->except(['edit', 'update', 'create', 'store']);
});




/*
 * dashboard compny  Routes
 * Namespaces indicate folder structure
 */
Route::group(['prefix' => 'dashboard','middleware' => ['web', 'auth','role:admin|company']], function () {
    Route::get('/', [App\Http\Controllers\BackController::class, 'company'])->name('company');
});
Route::group(['prefix' => 'dashboard','middleware' => ['web', 'auth','verified','VerifiedCompany','role:admin|company']], function () {
    Route::resource('registerations', App\Http\Controllers\company\registerationsController::class)->except(['create', 'store']);
    Route::resource('courses', App\Http\Controllers\company\coursesController::class);
    Route::get('courses.reset/{id}', [App\Http\Controllers\company\coursesController::class,'reset'])->name('courses.reset');
    Route::get('coursesimport', [App\Http\Controllers\company\coursesController::class,'import'])->name('courses.import');
    Route::post('importExcel', [App\Http\Controllers\company\coursesController::class, 'importExcel'])->name('importExcel');

    Route::get('sessionsimport', [App\Http\Controllers\company\sessionsController::class,'import'])->name('sessions.import');
    Route::post('importsessionsExcel', [App\Http\Controllers\company\sessionsController::class, 'importExcel'])->name('importsessionsExcel');

    Route::resource('sessions', App\Http\Controllers\company\sessionsController::class);
    Route::get('sessions.reset/{id}', [App\Http\Controllers\company\sessionsController::class,'reset'])->name('sessions.reset');
    Route::get('publishsession/{id}/{action}', [App\Http\Controllers\company\sessionsController::class,'publish'])->name('sessions.publish');
    Route::get('detailuser/{id}', [App\Http\Controllers\UserController::class,'show'])->name('detailuser');
    Route::get('detailcourses/{id}', [App\Http\Controllers\coursesController::class,'show'])->name('detailcourses');
});
Route::group(['prefix' => 'dashboard','middleware' => ['web', 'auth','role:company']], function () {
    Route::get('verifregistrequest/{id}/{response}', [App\Http\Controllers\company\registerationsController::class, 'update_registrationStatus'])->name('verifregistrequest');
    Route::get('createfromcourseform/create/{id}', [App\Http\Controllers\company\sessionsController::class, 'createfromcourseform'])->name('createfromcourseform');
});
    Route::post('agreeregistrtion/{id}', [App\Http\Controllers\registerationsController::class, 'agree_registrtion'])->name('agreeregistrtion');
    Route::post('registsess', [App\Http\Controllers\registerationsController::class, 'student_registsess'])->name('registsess');
    Route::get('getstatus/{id}', [App\Http\Controllers\registerationsController::class,'getstatus'])->name('getstatus');
/*
 * dashboard user  Routes
 * Namespaces indicate folder structure
 */
//Route::group(['prefix' => 'dashboarduser','middleware' => ['web', 'auth','verified','role:user']], function () {
Route::group(['prefix' => 'dashboarduser','middleware' => ['web', 'auth','verified']], function () {
Route::resource('registerationsuser', App\Http\Controllers\registerationsController::class)->except(['create', 'store']);
/** payment  url */

Route::get('actionpay/{idreg}', [App\Http\Controllers\registerationsController::class,'actionpay'])->name('actionpay');
Route::get('getpay/{idreg}', [App\Http\Controllers\registerationsController::class,'getpay'])->name('getpay');


});
Route::group(['prefix' => 'dashboarduser','middleware' => ['web', 'auth']], function () {
    Route::get('/', [App\Http\Controllers\BackController::class, 'user'])->name('user');

});


/*
 * Auth all Routes
 * Namespaces indicate folder structure
 */

Route::group(['prefix' => 'dashboard','middleware' => ['web', 'auth']], function () {
    //--------
    Route::get('user-profile', [App\Http\Controllers\Profile\UserProfileController::class, 'edit'])->name("user-profile.edit");
	Route::patch('user-profile', [App\Http\Controllers\Profile\UserProfileController::class, 'update'])->name("login-profile.update");
	Route::patch('updatesettingsprofile', [App\Http\Controllers\Profile\UserProfileController::class, 'updatesettings'])->name("updatesettingsprofile");
    Route::post('sendmsg', [App\Http\Controllers\messagingController::class, 'sendmsg'])->name("sendmsg");

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

/*
 * switchlanguage route
 */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageSwitchController@switchLang']);
Route::get('state/ajax/{id}',  [App\Http\Controllers\sessionsController::class, 'ajaxstate'])->name('ajaxstate');
Route::get('city/ajax/{id}',  [App\Http\Controllers\sessionsController::class, 'ajaxcity'])->name('ajaxcity');
// Route::get('',array('as'=>'myform.ajax','uses'=>'HomeController@));
// this route can return the subcateg with the subcateg_id
Route::get('findsubcategWithcategID/{id}', 'App\Http\Controllers\company\coursesController@findsubcategWithcategID');
Route::get('/getpartners', [App\Http\Controllers\HomeController::class, 'getpartners']);
Route::resource('languages', App\Http\Controllers\languageController::class);
Route::post('crop', [App\Http\Controllers\Profile\UserProfileController::class, 'crop'])->name('crop');
Route::post('subscribersstore', [App\Http\Controllers\subscriberFrontController::class, 'store'])->name('subscribersstore');

Route::get('cancelregistrtion/{id}', [App\Http\Controllers\registerationsController::class, 'cancelregistrtion'])->name("cancelregistrtion");

Route::post('clearnotif', [App\Http\Controllers\registerationsController::class, 'clearnotif'])->name('clearnotif');

/** url session */
Route::get('/{session}', [App\Http\Controllers\HomeController::class, 'singlcourse'])->name('detailcourse');
