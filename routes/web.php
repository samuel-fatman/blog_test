<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\UserLoginCheck;
use App\Http\Middleware\AdminLoginCheck;
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

Route::get('/', [UserController::class, 'index'])->name('homepage');
Route::get('/registration', [UserController::class, 'registration'])->name('user_reg');
Route::post('/registration', [UserController::class, 'form_submit'])->name('form_submit');
Route::get('/user_login', [UserController::class, 'login'])->name('user_login');
Route::post('/user_login', [UserController::class, 'form_submit_login'])->name('user_login_submit');
Route::get('/post/{id}', [BlogController::class, 'post_detail'])->name('post_detail');
Route::get('/Admin_login', [AdminController::class, 'login_page'])->name('login_page');
Route::post('/Admin_login', [AdminController::class, 'login_admin'])->name('login_admin');

Route::middleware([UserLoginCheck::class])->group(function () { 

   Route::get('/post_blog', [BlogController::class, 'post_blog'])->name('post_blog');
   Route::post('/post_blog', [BlogController::class, 'post_blog_submit'])->name('post_blog_submit');
   Route::post('/comment', [BlogController::class, 'post_comment'])->name('post_comment');
   Route::get('/comment_delete/{id}/{time}', [BlogController::class, 'comment_delete'])->name('comment_delete');
   Route::post('/comment_edit/{id}/{time}', [BlogController::class, 'comment_edit'])->name('comment_edit');
   Route::get('/blog_delete/{id}', [BlogController::class, 'blog_delete'])->name('blog_delete');
   Route::get('/blog_edit/{id}', [BlogController::class, 'blog_edit'])->name('blog_edit');
   Route::post('/blog_edit/{id}', [BlogController::class, 'blog_edit_submit'])->name('blog_edit_submit');
   Route::get('/user_logout', [UserController::class, 'user_logout'])->name('user_logout');
});

Route::middleware([AdminLoginCheck::class])->group(function () { 
 
   Route::get('/edit_user_by_admin/{id}', [AdminController::class, 'edit_user_by_admin'])->name('edit_user_by_admin');
   Route::post('/form_submit_edit', [AdminController::class, 'form_submit_edit'])->name('form_submit_edit');
   Route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])->name('delete_user');
});