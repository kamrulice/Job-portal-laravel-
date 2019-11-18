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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Job profile
 Route::get('/','jobController@index');
 Route::get('all/jobs','jobController@allJobs')->name('all/jobs');
 Route::get('jobs/showDetails/{id}/{slug}','jobController@showDetails')->name('jobs.showDetails');
 Route::get('/job/create','jobController@jobCreate')->name('job/create');
 Route::post('/job/save','jobController@jobStore')->name('job/save');
 Route::get('my/job','jobController@myJobs')->name('my/job');
 Route::get('/jobs/edit{id}','jobController@editJob')->name('jobs/edit');
 Route::post('job/update','jobController@updateJob')->name('job/update');
 Route::get('jobs/delete{id}','jobController@deleteJob')->name('jobs/delete');
 Route::post('/job/apply{id}','jobController@applyJob')->name('job/apply');
 Route::get('/job/applicant','jobController@jobApplicant');

 // Company info
 Route::get('/company/{id}/{company}','companyController@index')->name('company.index');
 Route::get('/company/profile','companyController@createProfile')->name('company/profile');
 Route::post('/company/register','companyController@store')->name('company/register');
 Route::post('/company/coverPhoto','companyController@coverPhoto')->name('company/coverPhoto');
 Route::post('/company/logo','companyController@CompanyLogo')->name('company/logo');

 //User profile
 Route::get('/user/profile','userProfileController@index')->name('user/profile');
 Route::post('/profile/store','userProfileController@store')->name('profile/store');
 Route::post('/profile/cover/letter','userProfileController@coverLetter')->name('profile/coverletter');
 Route::post('/profile/resume','userProfileController@resume')->name('profile/resume');
 Route::post('/profile/avatar','userProfileController@avatar')->name('profile/avatar');

// Employer info
// Route Method:Get,Post,View,Patch,Put,Delete,Resources,Group
Route::view('/employer/profile','auth.emp_register')->name('employer/profile');
Route::post('employer/register','employerRegisterController@store')->name('employer/register');
























