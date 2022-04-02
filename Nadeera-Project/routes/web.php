<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

// login Page (1st page)
Route::get('/', function () {
    return view('login');
});

// Users Page (2nd page)
Route::get('/login_success', function () {
    return view('successlogin');
});

// logout and go back to login page
Route::get('/logout',[App\Http\Controllers\usersController::class,'logout']);

// Add use to Database
Route::post('/insert_user',[App\Http\Controllers\usersController::class,'insert'])->name('insert.data');

// Check if user is logined
Route::post('/check_login',[App\Http\Controllers\usersController::class,'check_login'])->name('check.login');

// show all users in the Database
Route::get('/login_success',[App\Http\Controllers\MemberController::class,'show']);

// Delete user in the Database
Route::get('click_delete/{id}',[App\Http\Controllers\MemberController::class,'delete_function']);

Route::post('login_success/action', [App\Http\Controllers\MemberController::class, 'action'])->name('tabledit.action');



