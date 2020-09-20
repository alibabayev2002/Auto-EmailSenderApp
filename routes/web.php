<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/email/verify', function(){
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');
Route::get('/profile', function(){
    return view('profile');
})->middleware(['auth','verified'])->name('profile');
Route::get('/messagepanel', [App\Http\Controllers\HomeController::class,'get_message_panel'])->name('get.messagepanel');
Route::get('/messagepanel/delete/{id}', [App\Http\Controllers\HomeController::class,'delete_message']);
Route::get('/messagepanel/edit/{id}', [App\Http\Controllers\HomeController::class,'get_edit_message']);
Route::get('/send', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/delete/',function(){
    User::where('id',Auth::user()->id)->delete();
    return back();
})->name('get.profiledelete')->middleware(['auth']);
// POST

Route::post('/messagepanel/edit/{id}', [App\Http\Controllers\HomeController::class,'post_edit_message'])->middleware(['auth'])->name('post.editmessage');
Route::post('/send', [App\Http\Controllers\HomeController::class, 'send_message'])->name('post.home');
Route::post('/profile', function(request $request){
    $validatedData = $request->validate([
        'name' => 'required | string | max:255',
    ]);
    User::where('id',Auth::user()->id)->update([
        "name"=> $request->name,
    ]);
    return back();
})->middleware(['auth'])->name('profile.edit');


