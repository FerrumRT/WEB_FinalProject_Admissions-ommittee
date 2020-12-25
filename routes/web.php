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

Route::get('/404', 'PageController@pageNotFound');

Route::get('/about', 'PageController@about_us');

Route::get('/contacts', 'PageController@contacts')->name('contacts');

Route::get('/{name}/info', 'EducationDegreesController@show')->name('edu-deg-info');

Route::get('/faculties/{id}', 'FacultiesController@show')->name('faculty-info');

Route::get('/profile/student/{id}', 'StudentController@show')->name('student-profile');

Route::get('/profile/admission/{id}', 'AdmissionMemberController@show')->name('ad-mem-profile');

Route::post('/save/admission/{id}/profile', 'AdmissionMemberController@update_profile')->name('ad-mem-profile-save')->middleware('auth');

Route::post('/save/admission/{id}/password', 'AdmissionMemberController@update_password')->name('ad-mem-password-save')->middleware('auth');

Route::post('/save/admission/{id}/photo', 'AdmissionMemberController@update_photo')->name('ad-mem-photo-save')->middleware('auth');

Route::post('/save/student/{id}/profile', 'StudentController@update_profile')->name('student-profile-save')->middleware('auth');

Route::post('/save/student/{id}/password', 'StudentController@update_password')->name('student-password-save')->middleware('auth');

Route::post('/save/student/{id}/photo', 'StudentController@update_photo')->name('student-photo-save')->middleware('auth');

Route::post('/save/student/{id}/doc', 'StudentController@upload_document')->name('student-doc-save')->middleware('auth');

Route::get('/student/{id}/certificates', 'CertificateController@show')->name('certificates');

Route::post('/student/{id}/certificates/upload', 'CertificateController@upload_certificate')->name('certificate-upload')->middleware('auth');

Route::post('/student/{id}/certificates/delete', 'CertificateController@destroy')->name('certificate-delete')->middleware('auth');

Route::get('/result', 'NewsController@search')->name('news');


/** Online reception */
Route::get('/reception/student', 'MessageController@show_student')->name('reception-student')->middleware('auth');

Route::post('/reception/student/{id}/send', 'MessageController@send_student')->name('reception-student-send')->middleware('auth');

Route::get('/reception/admission', 'MessageController@show_admission')->name('reception-admission')->middleware('auth');

Route::get('/reception/{id}', 'ChatController@show')->name('reception-chat')->middleware('auth');

Route::post('/reception/{ad_id}/answer/{id}', 'ChatController@answer')->name('reception-answer')->middleware('auth');

Route::post('/reception/{u_id}/send_by_st/{id}', 'ChatController@send_student')->name('reception-chat-st-send')->middleware('auth');

Route::post('/reception/{u_id}/send_by_ad/{id}', 'ChatController@send_admission')->name('reception-chat-ad-send')->middleware('auth');
/** end */

/** Admin panel
* Faculties */
Route::get('/admin/faculties', 'AdminController@show_faculties')->name('admin-faculties')->middleware('auth');

Route::post('/admin/addFaculty', 'FacultiesController@store')->name('add-faculty')->middleware('auth');

Route::post('/admin/{id}/deleteFaculty', 'FacultiesController@destroy')->name('delete-faculty')->middleware('auth');

Route::get('/admin/{id}/editFaculty', 'FacultiesController@edit')->name('edit-faculty')->middleware('auth');

Route::post('/admin/{id}/saveFaculty', 'FacultiesController@update')->name('update-faculty')->middleware('auth');

/** Student */
Route::get('/admin/students', 'AdminController@show_students')->name('admin-students')->middleware('auth');

Route::post('/admin/addStudent', 'StudentController@store')->name('add-students')->middleware('auth');

Route::post('/admin/{id}/deleteStudent', 'StudentController@destroy')->name('delete-students')->middleware('auth');

Route::get('/admin/{id}/editStudent', 'StudentController@edit')->name('edit-students')->middleware('auth');

Route::post('/admin/{id}/saveStudent', 'StudentController@update')->name('update-students')->middleware('auth');

/** Education Degrees */
Route::get('/admin/education_degrees', 'AdminController@show_edu_deg')->name('admin-edu-deg')->middleware('auth');

Route::post('/admin/addEducationDegree', 'EducationDegreesController@store')->name('add-edu-deg')->middleware('auth');

Route::post('/admin/{id}/deleteEducationDegree', 'EducationDegreesController@destroy')->name('delete-edu-deg')->middleware('auth');

Route::get('/admin/{id}/editEducationDegree', 'EducationDegreesController@edit')->name('edit-edu-deg')->middleware('auth');

Route::post('/admin/{id}/saveEducationDegree', 'EducationDegreesController@update')->name('update-edu-deg')->middleware('auth');

/** Admission members */
Route::get('/admin/admission_members', 'AdminController@show_admission_member')->name('admin-ad-mem')->middleware('auth');

Route::post('/admin/addAdmissionMember', 'AdmissionMemberController@store')->name('add-ad-mem')->middleware('auth');

Route::post('/admin/{id}/deleteAdmissionMember', 'AdmissionMemberController@destroy')->name('delete-ad-mem')->middleware('auth');

Route::get('/admin/{id}/editAdmissionMember', 'AdmissionMemberController@edit')->name('edit-ad-mem')->middleware('auth');

Route::post('/admin/{id}/saveAdmissionMember', 'AdmissionMemberController@update')->name('update-ad-mem')->middleware('auth');
/** End Admin panel */

Auth::routes();

Route::resource('news', 'NewsController');

Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/sendhtmlemail','MailController@html_email');
Route::get('/sendattachmentemail','MailController@attachment_email');
