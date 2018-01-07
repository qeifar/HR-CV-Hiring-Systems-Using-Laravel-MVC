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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //
Route::get('/migrations/grid', 'MigrationsController@grid');
Route::resource('/migrations', 'MigrationsController');
Route::get('/password_resets/grid', 'Password_resetsController@grid');
Route::resource('/password_resets', 'Password_resetsController');
Route::get('/users/grid', 'UsersController@grid');
Route::resource('/users', 'UsersController');
Route::get('/appointed_positions/grid', 'Appointed_positionsController@grid');
Route::resource('/appointed_positions', 'Appointed_positionsController');
Route::get('/cocurriculars/grid', 'CocurricularsController@grid');
Route::resource('/cocurriculars', 'CocurricularsController');
Route::get('/competences/grid', 'CompetencesController@grid');
Route::resource('/competences', 'CompetencesController');
Route::get('/education/grid', 'EducationController@grid');
Route::resource('/education', 'EducationController');
Route::get('/people/grid', 'PeopleController@grid');
Route::resource('/people', 'PeopleController');
Route::get('/rujukans/grid', 'RujukansController@grid');
Route::resource('/rujukans', 'RujukansController');

Route::get('/carian/grid', 'CarianController@grid');
Route::resource('/carian', 'CarianController');


Route::get('/addme/grid', 'AddmeController@grid');
Route::resource('/addme', 'AddmeController');
Route::get('/strengths/grid', 'StrengthsController@grid');
Route::resource('/strengths', 'StrengthsController');

/*
Route::get(
    'cv/{$id}', 
    'FullCVController@showProfile')
    ->name('profile');

Route::get('/cv/{id}', function($id){
    return view('fullcv.master')->with('id',$id);
});*/

Route::get("cv/{id}", "FullCVController@index")->name('fullcv.index');
/*Route::get("companypda/{product_id}/{company_id}/create", "CompanyPdaController@create")->name('companypda.create');
Route::get("companypda/{product_id}/{company_id}/{id}/edit", "CompanyPdaController@edit")->name('companypda.edit');
Route::post("companypda/{product_id}/{company_id}", "CompanyPdaController@store")->name('companypda.store');
Route::put("companypda/{product_id}/{company_id}/{id}", "CompanyPdaController@update")->name('companypda.update');
Route::patch("companypda/{product_id}/{company_id}/{id}", "CompanyPdaController@update")->name('companypda.update');
Route::delete("companypda/{product_id}/{company_id}/{id}", "CompanyPdaController@destroy");

*/
Route::get("generate/cv", "GenerateCVController@index")->name('generatecv.index');

});