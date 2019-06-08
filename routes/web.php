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


//Login
Auth::routes();
Route::get('/admin/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
Auth::routes();
Route::get('/admin', 'AdminController@index');
Auth::routes();
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Auth::routes();
Route::get('/admin', 'AdminController@index')->name('admin.dashboard'); 

//Logout
Auth::routes();
Route::get('/logout', 'PagesController@logout')->name('logout')->middleware('authenticated');

//Welcome Route
Auth::routes();
Route::get('/', 'PagesController@welcome');

//Tournaments Routes
Auth::routes();
Route::get('/tournament', 'PagesController@tournament')->name('tournament')->middleware('authenticated');

//Daily Tournament Routes
Auth::routes();
Route::get('/resetalletournament', 'PagesController@resetalletournament')->name('resetalletournament')->middleware('authenticated');
Auth::routes();
Route::get('/dailytournament', 'PagesController@dailytournament')->name('dailytournament')->middleware('authenticated');
Auth::routes();
Route::post('/addplayer', 'PagesController@addplayer')->name('addplayer')->middleware('authenticated');
Auth::routes();
Route::post('/minusplayer', 'PagesController@minusplayer')->name('minusplayer')->middleware('authenticated');
Auth::routes();
Route::post('/rebuy', 'PagesController@rebuy')->name('rebuy')->middleware('authenticated');
Auth::routes();
Route::any('/eplayersview', 'PagesController@eplayersview')->name('eplayersview');
Auth::routes();
Route::any('/ebuyinview', 'PagesController@ebuyinview')->name('ebuyinview');
Auth::routes();
Route::any('/echipsview', 'PagesController@echipsview')->name('echipsview');
Auth::routes();
Route::any('/elevelview', 'PagesController@elevelview')->name('elevelview');
Auth::routes();
Route::any('/epotmoneyview', 'PagesController@epotmoneyview')->name('epotmoneyview');
Auth::routes();	
Route::get('/updatelevel/{id}', 'PagesController@updatelevel')->middleware('authenticated');
Auth::routes();	
Route::post('/editlevel/{id}', 'PagesController@editlevel')->middleware('authenticated');
Auth::routes();
Route::any('/addnewchips', 'PagesController@addnewchips')->name('addnewchips');  
Auth::routes();
Route::any('/addnewpercent', 'PagesController@addnewpercent')->name('addnewpercent'); 
Auth::routes();
Route::any('/addpercent', 'PagesController@addpercent')->name('addpercent');
Auth::routes();
Route::get('/deletepercent/{id}', 'PagesController@deletepercent')->name('deletepercent');
Auth::routes();
Route::post('/uploadchips', 'PagesController@uploadchips')->name('uploadchips');
Auth::routes();
Route::get('/updatechipsview/{id}', 'PagesController@updatechipsview')->name('updatechipsview');
Auth::routes();
Route::any('/updatechips/{id}', 'PagesController@updatechips')->name('updatechips');
Auth::routes();
Route::get('/delchips/{id}', 'PagesController@delchips')->name('delchips');
Auth::routes();
Route::any('/prizemoneyview', 'PagesController@prizemoneyview')->name('prizemoneyview'); 
Auth::routes();
Route::get('/editprizemoneyview/{id}', 'PagesController@editprizemoneyview')->name('editprizemoneyview');  
Auth::routes();
Route::post('/editprizemoney/{id}', 'PagesController@editprizemoney')->name('editprizemoney');
Auth::routes();
Route::post('/updatepotmoney/{id}', 'PagesController@updatepotmoney')->name('updatepotmoney'); 
Auth::routes();
Route::post('/updatebuyin/{id}', 'PagesController@updatebuyin')->name('updatebuyin'); 
Auth::routes();
Route::post('/updateplayer/{id}', 'PagesController@updateplayer')->name('updateplayer'); 

//Saturday Tournament Routes
Auth::routes();
Route::get('/saturdaytournament',array('as'=>'saturdaytournament','uses'=>'PagesController@saturdaytournament'));

Auth::routes();
Route::post('/saddplayer', 'SaturdayTournamentController@saddplayer')->name('saddplayer')->middleware('authenticated');
Auth::routes();
Route::post('/sminusplayer', 'SaturdayTournamentController@sminusplayer')->name('sminusplayer')->middleware('authenticated');
Auth::routes();
Route::post('/srebuy', 'SaturdayTournamentController@srebuy')->name('srebuy')->middleware('authenticated');

Auth::routes();
Route::any('/schipsview', 'SaturdayTournamentController@schipsview')->name('schipsview');
Auth::routes();
Route::any('/saddnewchips', 'SaturdayTournamentController@saddnewchips')->name('saddnewchips');  
Auth::routes();
Route::post('/suploadchips', 'SaturdayTournamentController@suploadchips')->name('suploadchips');
Auth::routes();
Route::get('/supdatechipsview/{id}', 'SaturdayTournamentController@supdatechipsview')->name('supdatechipsview');
Auth::routes();
Route::any('/supdatechips/{id}', 'SaturdayTournamentController@supdatechips')->name('supdatechips');
Auth::routes();
Route::get('/sdelchips/{id}', 'SaturdayTournamentController@sdelchips')->name('sdelchips');
Auth::routes();
Route::get('/sresetalletournament', 'SaturdayTournamentController@sresetalletournament')->name('sresetalletournament')->middleware('authenticated');
Auth::routes();
Route::any('/splayersview', 'SaturdayTournamentController@splayersview')->name('splayersview');
Auth::routes();
Route::post('/supdateplayer/{id}', 'SaturdayTournamentController@supdateplayer')->name('supdateplayer'); 
Auth::routes();
Route::any('/sbuyinview', 'SaturdayTournamentController@sbuyinview')->name('sbuyinview');
Auth::routes();
Route::post('/supdatebuyin/{id}', 'SaturdayTournamentController@supdatebuyin')->name('supdatebuyin'); 
Auth::routes();
Route::any('/slevelview', 'SaturdayTournamentController@slevelview')->name('slevelview');
Auth::routes();	
Route::get('/supdatelevel/{id}', 'SaturdayTournamentController@supdatelevel')->middleware('authenticated');
Auth::routes();	
Route::post('/seditlevel/{id}', 'SaturdayTournamentController@seditlevel')->middleware('authenticated');
Auth::routes();
Route::any('/spotmoneyview', 'SaturdayTournamentController@spotmoneyview')->name('spotmoneyview');
Auth::routes();
Route::post('/supdatepotmoney/{id}', 'SaturdayTournamentController@supdatepotmoney')->name('supdatepotmoney'); 
Auth::routes();
Route::get('/sprizemoneyview', 'SaturdayTournamentController@sprizemoneyview')->name('sprizemoneyview');  
Auth::routes();
Route::get('/seditprizemoneyview/{id}', 'SaturdayTournamentController@seditprizemoneyview')->name('seditprizemoneyview');  
Auth::routes();
Route::post('/seditprizemoney/{id}', 'SaturdayTournamentController@seditprizemoney')->name('seditprizemoney');
Auth::routes();
Route::get('/sdeletepercent/{id}', 'SaturdayTournamentController@sdeletepercent')->name('sdeletepercent');
Auth::routes();
Route::any('/saddnewpercent', 'SaturdayTournamentController@saddnewpercent')->name('saddnewpercent'); 
Auth::routes();
Route::any('/saddpercent', 'SaturdayTournamentController@saddpercent')->name('saddpercent');

//Search
Auth::routes();
Route::any('/search', 'PagesController@search')->middleware('authenticated');

//Admin Home Routes
Auth::routes();
Route::get('/adminhome', 'AdminController@adminhome')->name('adminhome')->middleware('authenticated');

 
 /*TESTING*/
Auth::routes();
 Route::get('/ajax-form-submit', 'FormController@index');
 Auth::routes();
 Route::post('/save-form', 'FormController@store');