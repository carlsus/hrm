<?php

use Illuminate\Routing\RouteAction;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login/portal', 'Auth\LoginController@showPortalLoginForm')->name('login.portal');
Route::post('/login/portal', 'Auth\LoginController@portalLogin');
Auth::routes();


Route::group(['middleware' => 'auth:portal'], function () {

    // Route::resource('portal', 'PortalController');
    Route::get('portal', 'PortalController@index');
    Route::get('portal/payslip', 'PortalController@payslip')->name('payslip');
    Route::get('portal/cashadvance', 'PortalController@cashadvance')->name('cashadvance');

    Route::resource('timeattendances', 'TimeAttendanceController');
    Route::get('allTimeAttendances', 'TimeAttendanceController@allTimeAttendances' )->name('allTimeAttendances');
    Route::get('employeeAttendances', 'TimeAttendanceController@employeeAttendances' )->name('employeeAttendances');
    Route::get('myPayslips', 'PortalController@myPayslips' )->name('myPayslips');
    Route::get('myCashAdvance', 'PortalController@myCashAdvance' )->name('myCashAdvance');
    Route::post('timeattendances/update', 'TimeAttendanceController@update')->name('timeattendances.update');

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('timeattendanceslog', 'TimeAttendanceLogController');
    Route::get('allTimesAttendanceLog', 'TimeAttendanceLogController@allTimeAttendances' )->name('allTimesAttendanceLog');

    Route::resource('departments', 'DepartmentController');
    Route::get('allDepartments', 'DepartmentController@allDepartments' )->name('allDepartments');
    Route::post('departments/update', 'DepartmentController@update')->name('departments.update');

    Route::resource('positions', 'PositionController');

    Route::get('allPositions', 'PositionController@allPositions' )->name('allPositions');
    Route::get('getPosition', 'PositionController@getPosition' )->name('getPosition');
    Route::post('positions/update', 'PositionController@update')->name('positions.update');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::get('allUsers', 'UserController@allUser' )->name('allUsers');
    // Route::get('users.index','UserController@index');




    Route::resource('employees', 'EmployeeController');
    Route::post('employees/update', 'EmployeeController@update')->name('employees.update');

    Route::resource('deductions', 'DeductionController');
    Route::get('allDeductions', 'DeductionController@allDeductions' )->name('allDeductions');
    Route::post('deductions/update', 'DeductionController@update')->name('deductions.update');


    Route::resource('accountabilities', 'AccountabilityController');
    Route::get('allAccountability', 'AccountabilityController@allAccountability' )->name('allAccountability');
    Route::post('accountabilities/update', 'AccountabilityController@update')->name('accountabilities.update');


    Route::resource('projects', 'ProjectController');
    Route::get('allProjects', 'ProjectController@allProjects' )->name('allProjects');
    Route::post('projects/update', 'AccountabilityController@update')->name('projects.update');


    Route::resource('payslips', 'PayslipController');
    Route::get('allPayslips', 'PayslipController@allPayslips' )->name('allPayslips');
    Route::get('getPayslips', 'PayslipController@getPayslips' )->name('getPayslips');


    Route::resource('employeeaccountability', 'EmployeeAccountabilityController');
    // Route::get('employeeAccountability', 'EmployeeAccountabilityController@allAccountability' )->name('employeeAccountability');

    Route::resource('cashadvances', 'CashAdvanceController');
    Route::get('allCashAdvances', 'CashAdvanceController@allCashAdvances' )->name('allCashAdvances');
    Route::post('cashadvances/update', 'CashAdvanceController@update')->name('cashadvances.update');

});

