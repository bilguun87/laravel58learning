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
Route::get('/demo-layout', function() {
	return view('layouts.demo-layout');
});
Route::get('/demo-index', function() {
	return view('blade-tutor.demo-index');
});
Route::get('/localization-tutor-locale/{locale}', function($locale){
	App::setLocale($locale);
	return view('localization-tutor.locale');
});
Route::get('/localization-tutor-translate/{locale}', function($locale){
	App::setLocale($locale);
	return view('localization-tutor.translate');
});
Route::get('/github-test', function(){
	return view('hello');
});
