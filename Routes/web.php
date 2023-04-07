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

Route::prefix('organization')->middleware(['auth', 'admin:organization'])->group(function () {

    Route::get('/', 'HomeController@index')->name('organization.module');

    Route::get('profile', 'ProfileController@index')->name('organization.profile');

    Route::delete('branch/deleteAll', 'BranchController@deleteAll')->name('branch.deleteAll');
    Route::delete('section/deleteAll', 'SectionController@deleteAll')->name('section.deleteAll');
    Route::delete('campus/deleteAll', 'CampusController@deleteAll')->name('campus.deleteAll');
    Route::delete('faculty/deleteAll', 'FacultyController@deleteAll')->name('faculty.deleteAll');
    Route::delete('department/deleteAll', 'DepartmentController@deleteAll')->name('department.deleteAll');

    Route::resource('branch', 'BranchController');
    Route::resource('section', 'SectionController');
    Route::resource('campus', 'CampusController');
    Route::resource('faculty', 'FacultyController');
    Route::resource('department', 'DepartmentController');
    Route::resource('financialyear', 'FinancialYearController');
});
