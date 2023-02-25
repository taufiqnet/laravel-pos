<?php

use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\employee\EmployeeDetailsController;
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


Route::group(['middleware' => ['auth', 'verified']], function () {

    /* --------------------------- Employee Management --------------------------- */

    Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('create-employee', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('store-employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('view-employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('edit-employee/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('update-employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('destroy-employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    /* --------------------------- End Employee Management --------------------------- */

    /* --------------------------- Employee Details Management --------------------------- */
    Route::get('employeeDetails/{id}', [EmployeeDetailsController::class, 'index'])->name('employeeDetails.index');
    Route::get('create-employeeDetails/{id}', [EmployeeDetailsController::class, 'create'])->name('employeeDetails.create');
    Route::post('store-employeeDetails/{id}', [EmployeeDetailsController::class, 'store'])->name('employeeDetails.store');
    Route::get('view-employeeDetails/{id}', [EmployeeDetailsController::class, 'show'])->name('employeeDetails.show');
    Route::get('edit-employeeDetails/{id}', [EmployeeDetailsController::class, 'edit'])->name('employeeDetails.edit');
    Route::put('update-employeeDetails/{id}', [EmployeeDetailsController::class, 'update'])->name('employeeDetails.update');
    Route::delete('destroy-employeeDetails/{id}', [EmployeeDetailsController::class, 'destroy'])->name('employeeDetails.destroy');

    /* --------------------------- End Employee Details Management --------------------------- */
});
