<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// public/index.php ->boostrap->service provider->view/index.blade.php =>extends các views khác=>view người dùng
// DÙNG Tailwindcss và Controller Resources
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
// Đang FAILED: Dùng Resources Controller mà lại phải đi khai báo từng Route

//Vào function tạo bài mới-Đang gặp lỗi:Nếu đặt Route:create liền kề với Route:show thì 2 Route này nhảy qua nhau
Route::get('/blog/create',[PostsController::class, 'create'] );

//Vào Controller PagesController và show ra trang index-trang chủ
Route::get('/',[PagesController::class, 'index'] );

// Còn index trong Route này là hiển thị ra danh sách bài viết: Bài mới nhất nằm trên cùng
Route::get('/blog',[PostsController::class, 'index'] );

// Save bài đăng
Route::post('/save',[PostsController::class, 'store'] );

// Show chi tiết bài post dựa vào slug
Route::get('/blog/{slug}',[PostsController::class, 'show'] );

// Edit
Route::get('/blog/{slug}/edit',[PostsController::class, 'edit'] );

// Update
Route::put('/blog/{slug}/update',[PostsController::class, 'update'] );

// Delete
Route::post('/blog/{slug}/delete',[PostsController::class, 'destroy'] );





Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

