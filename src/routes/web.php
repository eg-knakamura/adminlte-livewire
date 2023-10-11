<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', function () {
    return view('/auth/login');
})
    ->name('admin.login');

Route::post(
    '/admin/auth',
    '\App\Http\Controllers\Admin\LoginController@authenticate'
)->name('admin.auth');

Route::post(
    '/admin/logout',
    '\App\Http\Controllers\Admin\LoginController@logout'
)->name('admin.logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/home', function () {
        return view('/admin/home');
    })->name('admin.home');

    Route::get(
        '/admin/administrator/create',
        '\App\Http\Controllers\Admin\AdministratorController@createIndex'
    )->name('administrator.create');

    Route::get(
        '/admin/administrator/list',
        '\App\Http\Controllers\Admin\AdministratorController@listIndex'
    )->name('administrator.list');

    Route::get(
        '/admin/administrator/edit/{id}',
        '\App\Http\Controllers\Admin\AdministratorController@editIndex'
    )->name('administrator.edit');
});
