<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

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



Auth::routes();

Route::get('/',[HomeController::class,'index']);

Route::get('user/insert',[HomeController::class,'show']);
Route::post('/user-form', [HomeController::class, 'create']);
Route::get('/user-data', [HomeController::class, 'display'])->name('user.display');
Route::post('users/edit/{id}', [HomeController::class, 'update'])->name('user.update');
Route::get('users/delete/{id}', [HomeController::class, 'destroy'])->name('user.destroy');
Route::get('/users/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');

Route::get('/chatbox/{id?}', [HomeController::class, 'chatbox']);
Route::post('/adminmessage/{id}', [HomeController::class, 'adminmessage'])->name('adminmessage');

Route::get('/client-add', [ClientController::class, 'index'])->name('client.add');
Route::post('/client-create', [ClientController::class, 'create'])->name('client.create');
Route::get('/client-display', [ClientController::class, 'display'])->name('client.display');
Route::get('/client-edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
Route::post('/client-edit/{id}', [ClientController::class, 'update'])->name('client.update');
Route::get('/client-destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

Route::get('/client-profile/{id}', [ClientController::class, 'clientprofile'])->name('client-profile');

Route::get('client-access', [HomeController::class, 'showClientAccessForm']);
Route::post('client-access/{id}', [HomeController::class, 'saveClientAccess']);
Route::get('user-access', [ClientController::class, 'showUserAccessForm']);
Route::post('user-access/{id}', [ClientController::class, 'saveUserAccess']);

Route::post('/upload', [ClientController::class, 'upload'])->name('upload');
Route::get('/client-add-csv', [ClientController::class, 'show']);

Route::post('/add-comment/{id}', [ClientController::class, 'addcomment'])->name('add-comment');
Route::get('/view_comment/{id}', [ClientController::class, 'viewcomment']);





