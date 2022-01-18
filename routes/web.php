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
Route::get('map', 'SectionController@map');

// Route::redirect('/','/en');
Route::group(['prefix' => '{locale}'] , function(){

	 Route::get('index' , 'MainController@index')->middleware('lang')->middleware('login');


	 Route::get('teacher', 'TeacherController@index')->middleware('lang');
	 Route::get('teacher/create' , 'TeacherController@create')->middleware('lang');
	 



	 Route::get('student/create' , 'StudentController@create')->middleware('lang');
	 Route::get('student', 'StudentController@index')->middleware('lang');


	 Route::get('section/create' , 'SectionController@create')->middleware('lang');
	 Route::get('section', 'SectionController@index')->middleware('lang');



});


Route::get('/', function () {
    return view('welcome');
});
Route::get('test/{id}' , 'TestController@generate');




 Route::get('buttons' , 'MainController@index2');


 Route::get('teacher/create' , 'TeacherController@create')->middleware('lang');
 Route::get('teacher', 'TeacherController@index')->middleware('lang');
 Route::post('teacher/store', 'TeacherController@store');
 Route::get('teacher/edit/{id}', 'TeacherController@edit')->middleware('lang');
 Route::post('teacher/update/{id}', 'TeacherController@update');
 Route::get('teacher/delete/{id}', 'TeacherController@destroy');
 Route::get('teacher/details/{id}', 'TeacherController@details')->middleware('lang');

 Route::get('student/create' , 'StudentController@create')->middleware('lang');
 Route::get('student', 'StudentController@index')->middleware('lang');
 Route::post('student/store' , 'StudentController@store');
 Route::get('student/edit/{id}' , 'StudentController@edit')->middleware('lang');
 Route::post('student/update/{id}' , 'StudentController@update');
 Route::get('student/delete/{id}' , 'StudentController@destroy');
 Route::get('student/details/{id}' , 'StudentController@details')->middleware('lang');
 Route::get('student/qr' , 'StudentController@student_details');
 Route::get('student/search' , 'StudentController@search');


 Route::get('section/create' , 'SectionController@create')->middleware('lang');
 Route::get('section', 'SectionController@index')->middleware('lang');
 Route::post('section/store', 'SectionController@store');
 Route::get('section/edit/{id}', 'SectionController@edit')->middleware('lang');
 Route::post('section/update/{id}', 'SectionController@update');
 Route::get('section/delete/{id}', 'SectionController@destroy');
 Route::get('section/cancel', 'SectionController@cancel');
 Route::get('section/details/{id}' , 'SectionController@details')->middleware('lang');

Route::post('category/store' , 'Dashboard\CategoryController@store');
Route::get('category/create' , 'Dashboard\CategoryController@create');
Route::get('test' , 'SectionController@test');



Route::get('localization',function(){
	if(App::getLocale() == 'en'){
		session()->put(['lang'=>'ar']);
	}else{
       session()->put(['lang'=>'en']);
	}
	
	dd(session('lang'));
	App::setlocale(session('lang'));
	
});

