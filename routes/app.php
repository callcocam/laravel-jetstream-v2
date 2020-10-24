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
Route::prefix(app('currentTenant')->prefix)
    ->middleware(['tenant','auth:sanctum', 'verified'])
    ->group(function (){
        Route::resource('users', \App\Http\Controllers\Livewire\Landlord\UserController::class);
        Route::resource('roles', \App\Http\Controllers\Livewire\Landlord\RoleController::class);
        Route::resource('permissions', \App\Http\Controllers\Livewire\Landlord\PermissionController::class);
        Route::resource('menus', \App\Http\Controllers\Livewire\Landlord\MenuController::class);
        Route::resource('menu-types', \App\Http\Controllers\Livewire\Landlord\MenuTypeController::class);
        Route::resource('sub-menus', \App\Http\Controllers\Livewire\Landlord\SubMenuController::class);
    });
