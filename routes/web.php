<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[EmployeeController::class,'index'])->name('index');
Route::get('/admin_login',[EmployeeController::class,'admin_login'])->name('admin_login');
Route::get('/index1',[EmployeeController::class,'index1'])->name('index1');
Route::post('/adminlogin',[EmployeeController::class,'adminlogin'])->name('adminlogin');
Route::get('/admin_home',[EmployeeController::class,'admin_home'])->name('admin_home');
Route::get('/register',[EmployeeController::class,'register'])->name('register');
Route::post('/registration',[EmployeeController::class,'registration'])->name('registration');
Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('edit');
Route::post('/update/{id}',[EmployeeController::class,'update'])->name('update');
Route::get('/view',[EmployeeController::class,'view'])->name('view');
Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('delete');