<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
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


Route::group(['middleware'	=>	'guest'], function(){
    Route::get('/', [IndexController::class,'index'])->name('index');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login',[AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/banned', [IndexController::class,'banned'])->name('banned');
});

Route::group(['middleware'	=>	'auth'], function() {
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/myposts', [PostController::class,'getPosts'])->name('myposts');
    Route::get('/newpost', [PostController::class,'create'])->name('newpost');
    Route::post('/newpost', [PostController::class,'store']);
    Route::get('/editpost/{id}', [PostController::class,'edit'])->name('editpost');
    Route::post('/editpost/{id}', [PostController::class,'update']);
    Route::get('/deletepost/{id}', [PostController::class,'destroy'])->name('deletepost');

    Route::get('/opencomment/{id}', [MessageController::class,'create'])->name('opencomment');
    Route::post('/opencomment/{id}', [MessageController::class,'store']);
    Route::get('/readcomment', [MessageController::class,'read'])->name('readcomment');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});


Route::group(['prefix' => 'adminPanel','middleware'	=>	'auth','isadmin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('adminPanel');
    Route::get('/set_notice/{id}', [AdminController::class,'set_notice'])->name('set_notice');
    Route::post('/set_notice/{id}', [AdminController::class,'returnPost']);
    Route::get('/publicatepost/{id}', [AdminController::class,'publicatepost'])->name('publicatepost');
    Route::get('/deletepost/{id}', [AdminController::class,'deletepost'])->name('deletepost');

    Route::get('/users', [AdminController::class,'users'])->name('users');
    Route::get('/getusers', [AdminController::class,'getusers'])->name('getusers');
    Route::get('/useredit/{id}', [AdminController::class,'useredit'])->name('useredit');
    Route::post('/useredit/{id}', [AdminController::class,'updateuser']);
    Route::get('/toggleblock/{id}', [AdminController::class,'toggleblock'])->name('toggleblock');
    Route::get('/userdestroy/{id}', [AdminController::class,'userdestroy'])->name('userdestroy');
});

