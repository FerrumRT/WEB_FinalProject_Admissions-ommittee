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

Route::get('/', 'PageController@index');

Route::get('/403', 'PageController@accessForbidden');

Route::get('/about', 'PageController@about_us');

Route::get('/contacts', 'PageController@contacts');

Route::get('/{name}/info', 'EducationDegreesController@show')->name('edu-deg-info');

Route::get('/faculties/{id}', 'FacultiesController@show')->name('faculty-info');

Route::get('/profile/member/{id}', 'StudentController@show')->name('ad-mem-profile');

Route::get('/profile/student/{id}', 'StudentController@show')->name('student-profile');

Route::get('/profile/{id}', 'AdmissionMemberController@show')->name('ad-mem-profile');

/** Admin panel
* Faculties */
Route::get('/admin/faculties', 'AdminController@show_faculties')->name('admin-faculties');

Route::post('/admin/addFaculty', 'FacultiesController@store')->name('add-faculty');

Route::post('/admin/{id}/deleteFaculty', 'FacultiesController@destroy')->name('delete-faculty');

Route::get('/admin/{id}/editFaculty', 'FacultiesController@edit')->name('edit-faculty');

Route::post('/admin/{id}/saveFaculty', 'FacultiesController@update')->name('update-faculty');

/** Student */
Route::get('/admin/students', 'AdminController@show_students')->name('admin-students');

Route::post('/admin/addStudent', 'StudentController@store')->name('add-students');

Route::post('/admin/{id}/deleteStudent', 'StudentController@destroy')->name('delete-students');

Route::get('/admin/{id}/editStudent', 'StudentController@edit')->name('edit-students');

Route::post('/admin/{id}/saveStudent', 'StudentController@update')->name('update-students');

/** Education Degrees */
Route::get('/admin/education_degrees', 'AdminController@show_edu_deg')->name('admin-edu-deg');

Route::post('/admin/addEducationDegree', 'EducationDegreesController@store')->name('add-edu-deg');

Route::post('/admin/{id}/deleteEducationDegree', 'EducationDegreesController@destroy')->name('delete-edu-deg');

Route::get('/admin/{id}/editEducationDegree', 'EducationDegreesController@edit')->name('edit-edu-deg');

Route::post('/admin/{id}/saveEducationDegree', 'EducationDegreesController@update')->name('update-edu-deg');

/** Admission members */
Route::get('/admin/admission_members', 'AdminController@show_admission_member')->name('admin-ad-mem');

Route::post('/admin/addAdmissionMember', 'AdmissionMemberController@store')->name('add-ad-mem');

Route::post('/admin/{id}/deleteAdmissionMember', 'AdmissionMemberController@destroy')->name('delete-ad-mem');

Route::get('/admin/{id}/editAdmissionMember', 'AdmissionMemberController@edit')->name('edit-ad-mem');

Route::post('/admin/{id}/saveAdmissionMember', 'AdmissionMemberController@update')->name('update-ad-mem');
/** End Admin panel */

Auth::routes();

Route::resource('education_degrees', 'EducationDegreesController');

Route::resource('faculties', 'FacultiesController');

Route::resource('news', 'NewsController');
