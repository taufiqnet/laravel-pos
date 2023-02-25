<?php

use App\Http\Controllers\branch\BranchController;
use App\Http\Controllers\company\CompanyController;
use App\Http\Controllers\department\DepartmentController;
use App\Http\Controllers\designation\DesignationController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\employee\EmployeeDetailsController;
use App\Http\Controllers\grade\GradeController;
use App\Http\Controllers\unit\UnitController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\leave\LeaveTypesController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* --------------------------- Frontpage routes --------------------------- */

Route::get('employee-registration', [EmployeeController::class, 'employee_registration'])->name('employee_registration');
Route::post('employee-registered', [EmployeeController::class, 'employee_register'])->name('employee_register');

/* --------------------------- End Frontpage routes --------------------------- */

Route::prefix('admin')->group(function () {
    //company
    Route::get('company', [CompanyController::class, 'index'])->name('company.index');
    Route::post('company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::get('company/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');

    //branch
    Route::get('branch', [BranchController::class, 'index'])->name('branch.index');
    Route::post('branch', [BranchController::class, 'store'])->name('branch.store');
    Route::get('branch/create', [BranchController::class, 'create'])->name('branch.create');
    Route::get('branch/{id}', [BranchController::class, 'show'])->name('branch.show');
    Route::put('branch/{id}', [BranchController::class, 'update'])->name('branch.update');
    Route::delete('branch/{id}', [BranchController::class, 'destroy'])->name('branch.destroy');
    Route::get('branch/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');

    //grade
    Route::get('grade', [GradeController::class, 'index'])->name('grade.index');
    Route::post('grade', [GradeController::class, 'store'])->name('grade.store');
    Route::get('grade/create', [GradeController::class, 'create'])->name('grade.create');
    Route::get('grade/{id}', [GradeController::class, 'show'])->name('grade.show');
    Route::put('grade/{id}', [GradeController::class, 'update'])->name('grade.update');
    Route::delete('grade/{id}', [GradeController::class, 'destroy'])->name('grade.destroy');
    Route::get('grade/{id}/edit', [GradeController::class, 'edit'])->name('grade.edit');

    //designation
    Route::get('designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::post('designation', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::get('designation/{id}', [DesignationController::class, 'show'])->name('designation.show');
    Route::put('designation/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::delete('designation/{id}', [DesignationController::class, 'destroy'])->name('designation.destroy');
    Route::get('designation/{id}/edit', [DesignationController::class, 'edit'])->name('designation.edit');

    //unit
    Route::get('unit', [UnitController::class, 'index'])->name('unit.index');
    Route::post('unit', [UnitController::class, 'store'])->name('unit.store');
    Route::get('unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::get('unit/{id}', [UnitController::class, 'show'])->name('unit.show');
    Route::put('unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('unit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
    Route::get('unit/{id}/edit', [UnitController::class, 'edit'])->name('unit.edit');

    //department
    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::get('department/{id}', [DepartmentController::class, 'show'])->name('department.show');
    Route::put('department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('department/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    Route::get('department/{id}/edit', [DepartmentController::class, 'edit'])->name('department.edit');

    //leave_type
    Route::get('leave-types', [LeaveTypesController::class, 'index'])->name('leavetypes.index');
    Route::post('leave-types', [LeaveTypesController::class, 'store'])->name('leavetypes.store');
    Route::get('create-leavetype', [LeaveTypesController::class, 'create'])->name('leavetypes.create');
    Route::get('leave-types/{id}', [LeaveTypesController::class, 'show'])->name('leavetypes.show');
    Route::put('leave-types/{id}', [LeaveTypesController::class, 'update'])->name('leavetypes.update');
    Route::delete('leave-types/{id}', [LeaveTypesController::class, 'destroy'])->name('leavetypes.destroy');
    Route::get('leave-types/{id}/edit', [LeaveTypesController::class, 'edit'])->name('leavetypes.edit');
});
