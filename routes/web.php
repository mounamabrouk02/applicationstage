<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','AccueilController@index');

Route::post('contact','ContactController@store');

Route::get('contact','ContactController@index');

Route::get('/apropos','ApropoController@index');

Route::resource('/demandes','DemandeController');



Auth::routes();




Route::resource('/publications', 'PublicationController');
Route::resource('/certificat', 'CertificatController');
Route::resource('/annonces', 'AnnoncesController');



Route::resource('/profile','ProfileController');

Route::get('/reglages','ReglagesController@index');
Route::post('/reglages','ReglagesController@changePassword');


Route::resource('/user','UserController');

Route::resource('/comment','CommentController');

Route::get('messageries','MessagerieController@index');
Route::get('messageries/message/{id}','MessagerieController@getMessage')->name('message');
Route::post('messageries/message','MessagerieController@sendMessage');



Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::GET('admin/demandes','AdminDemandeController@index');
Route::DELETE('admin/demandes/{id}','AdminDemandeController@destroy');
Route::resource('admin/messages','AdminContactController');
Route::delete('admin/messages/{id}','ContactController@destroy');
Route::get('admin/messages/{id}','ContactController@show');

Route::resource('/admin/apropos','AdminApropoController');

Route::post('/admin/logout','Admin\LoginController@logout')->name('admin-logout');
Route::post('/admin/changepassword','Admin\LoginController@changepassword')->name('changepassword');

Route::GET('admin/stagiaires','AdminStagiairesController@index');
Route::DELETE('admin/stagiaires/{id}','AdminStagiairesController@destroy');
Route::get('admin/stagiaires/forgot/{id}','AdminStagiairesController@forgot');

