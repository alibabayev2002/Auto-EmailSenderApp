<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;
use App\Http\Controllers\MainController;

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
Auth::routes(['verify' => true]);
// GET
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('welcome');
Route::get('/email/verify', [MainController::class,'verify_email'])->middleware(['auth'])->name('verification.notice');
Route::get('/profile', [MainController::class,'get_profile'])->middleware(['auth','verified'])->name('profile');
Route::get('/messagepanel', [App\Http\Controllers\AdminController::class,'get_message_panel'])->name('get.messagepanel');
Route::get('/messagepanel/delete/{id}', [App\Http\Controllers\AdminController::class,'delete_message']);
Route::get('/messagepanel/edit/{id}', [App\Http\Controllers\AdminController::class,'get_edit_message']);
Route::get('/send', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/profile/delete/',[MainController::class,'delete_profile'])->name('get.profiledelete')->middleware(['auth','verified']);
// POST

Route::post('/messagepanel/edit/{id}', [App\Http\Controllers\AdminController::class,'post_edit_message'])->middleware(['auth'])->name('post.editmessage');
Route::post('/send', [App\Http\Controllers\AdminController::class, 'send_message'])->name('post.home');
Route::post('/profile',[MainController::class,'post_profile'] )->middleware(['auth'])->name('profile.edit');


