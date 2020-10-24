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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->to(sprintf("%s/dashboard", app('currentTenant')->prefix));
});

Route::prefix(app('currentTenant')->prefix)
    ->middleware(['tenant','auth:sanctum', 'verified'])
    ->group(function (){
        $prefix =  app('currentTenant')->prefix;
        Route::get('/dashboard', fn () => view(sprintf("%s.dashboard", $prefix)))->name(sprintf("%s.dashboard", $prefix));
        Route::post('/current/tenant/update', function (\Illuminate\Http\Request $request) {
            return back();
        })->name('current-tenant.update');

});
