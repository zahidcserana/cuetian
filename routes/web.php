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

Route::get('/home', 'HomeController@index');

/////

Route::get('/profile',['as'=>'profile','uses'=>'HomeController@ViewProfile']);
Route::post('/profile_update',['as'=>'profile_update','uses'=>'HomeController@UpdateProfile']);

Route::post('/image_upload',['as'=>'image_upload','uses'=>'HomeController@ImageUpload']);

Route::get('/users',['as'=>'users','uses'=>'HomeController@Users']);

Route::get('/user_details/{id}',['as'=>'user_details','uses'=>'HomeController@UserDetails']);


Route::get('/student_view',['as'=>'student_view','uses'=>'StudentController@StudentView']);
Route::get('/student_details/{id}',['as'=>'student_details','uses'=>'StudentController@StudentDetails']);
Route::get('/student_remove/{id}',['as'=>'student_remove','uses'=>'StudentController@StudentRemove']);
Route::post('/student_update',['as'=>'student_update','uses'=>'StudentController@StudentUpdate']);
Route::post('/student_image',['as'=>'student_image','uses'=>'StudentController@StudentImageUpload']);

Route::get('/student_add',['as'=>'student_add','uses'=>'StudentController@StudentAddForm']);
Route::post('/student_add',['as'=>'student_add','uses'=>'StudentController@AddStudent']);

Route::get('/notice_view',['as'=>'notice_view','uses'=>'NoticeController@ViewNotice']);
Route::get('/add_notice',['as'=>'add_notice','uses'=>'NoticeController@NoticeForm']);
Route::post('/add_notice',['as'=>'add_notice','uses'=>'NoticeController@AddNotice']);
Route::get('/notice_remove/{id}',['as'=>'notice_remove','uses'=>'NoticeController@NoticeRemove']);
