<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'role:user'], function () {

    Route::get('/user', function () {

        return 'Welcome...!!';
    });
});

Route::get('/roles', [PermissionController::class,'Permission']);

// use the app\Http\Controllers\UserAccessController.php for check the permission