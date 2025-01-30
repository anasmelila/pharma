<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[EmployeeController::class, 'register']);
Route::post('save-employee',[EmployeeController::class, 'save'])->name('save.employee');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('do-login', [LoginController::class, 'doLogin'])->name('do.login');


Route::get('adminlogin', [AdminController::class, 'adminlogin'])->name('adminlogin');
Route::post('admin-do-login', [AdminController::class, 'admindoLogin'])->name('admin.do.login');

Route::middleware(['auth:web'])->group(function () {
    Route::get('list', [EmployeeController::class, 'list'])->name('list');
    Route::get('addreport', [EmployeeController::class, 'addreport'])->name('addreport');
    Route::post('save-report', [ReportController::class, 'savereport'])->name('save.report');
    Route::get('delete-report/{reportId}', [ReportController::class, 'delete'])->name('delete.report');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:admins'])->group(function () {
 Route::put('update-report-status/{reportId}', [ReportController::class, 'updateStatus'])->name('update.report.status');
 Route::get('adminlist', [AdminController::class, 'adminlist'])->name('adminlist');
 Route::get('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
});
