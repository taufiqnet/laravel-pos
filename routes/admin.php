<?php

use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
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
    /* --------------------------- Role Management --------------------------- */
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/create-role', [RoleController::class, 'create_role'])->name('create_role');
    Route::post('/store-role', [RoleController::class, 'store_role'])->name('store_role');
    Route::get('/edit-role/{id}', [RoleController::class, 'edit_role'])->name('edit_role');
    Route::put('/update-role/{id}', [RoleController::class, 'update_role'])->name('update_role');
    Route::get('/delete-role/{id}', [RoleController::class, 'delete_role'])->name('delete_role');
    /* --------------------------- End Role Management --------------------------- */

    /* --------------------------- Permission Management --------------------------- */
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/create-permission', [PermissionController::class, 'create_permission'])->name('create_permission');
    Route::post('/store-permission', [PermissionController::class, 'store_permission'])->name('store_permission');
    Route::get('/edit-permission/{id}', [PermissionController::class, 'edit_permission'])->name('edit_permission');
    Route::put('/update-permission/{id}', [PermissionController::class, 'update_permission'])->name('update_permission');
    Route::get('/delete-permission/{id}', [PermissionController::class, 'delete_permission'])->name('delete_permission');
    /* --------------------------- End Permission Management --------------------------- */

    /* --------------------------- Group Management --------------------------- */
    Route::get('/create-group', [PermissionController::class, 'create_group'])->name('create_group');
    Route::post('/store-group', [PermissionController::class, 'store_group'])->name('store_group');
    Route::get('/edit-group/{id}', [PermissionController::class, 'edit_group'])->name('edit_group');
    Route::put('/update-group/{id}', [PermissionController::class, 'update_group'])->name('update_group');
    Route::get('/delete-group/{id}', [PermissionController::class, 'delete_group'])->name('delete_group');
    /* --------------------------- End Group Management --------------------------- */

     /* --------------------------- User Management --------------------------- */
     Route::get('/users', [UserController::class, 'index'])->name('users');
     Route::get('/create-user', [UserController::class, 'create_user'])->name('create_user');
     Route::post('/store-user', [UserController::class, 'store_user'])->name('store_user');
     Route::get('/edit-user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
     Route::put('/update-user/{id}', [UserController::class, 'update_user'])->name('update_user');
     Route::get('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
     /* --------------------------- End User Management --------------------------- */
});
