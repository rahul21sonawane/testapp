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
    return redirect(route('login'));
});
Auth::routes();
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware('role:admin')->name('admin');
Route::get('/superadmin', 'App\Http\Controllers\SuperAdminController@index')->middleware('role:superadmin');
Route::get('admin/getjob', [App\Http\Controllers\AdminController::class, 'getJobcard'])->name('getjob');
Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
Route::post('admin/storejobcard', [App\Http\Controllers\AdminController::class, 'storeJobcard'])->name('storejobcard');
Route::get('/admin/edit/{id}',[App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
Route::post('/admin/edit/{id}',[App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
Route::get('/admin/view/{id}',[App\Http\Controllers\AdminController::class, 'view'])->name('view');
