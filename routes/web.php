<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\usercontroller;

use App\Http\Controllers\LikeController;

use Illuminate\Support\Facades\Session;
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
    return view('signup');
})->name('/');

Route::get('/profile',[usercontroller::class,'profile'])->name('profile');

Route::get('/logout', function () {
    Session::forget('user'); 
    return redirect('/login');
})->name('logout');

Route::get('/login', function () {
    return view('login');
});

Route::post('/signup',[usercontroller::class,'signup'])->name('signup');

Route::post('/login_submit', [usercontroller::class, 'login'])->name('login_submit');

Route::post('/post', [usercontroller::class, 'posts'])->name('posts');

Route::get('/timeline', [usercontroller::class, 'timeline'])->name('timeline');

Route::get('/change_image', [UserController::class, 'changeImage'])->name('change_image');

Route::post('/upload_image', [UserController::class, 'uploadImage'])->name('upload_image');

Route::get('/change_cover', [UserController::class, 'changeCover'])->name('change_cover');

Route::post('/upload_cover', [UserController::class, 'uploadCover'])->name('upload_cover');

Route::get('/delete_post/{id}', [UserController::class, 'deletePost'])->name('delete_post');

Route::get('/get-post', [UserController::class, 'getPost'])->name('editpost');

Route::get('/like', [LikeController::class, 'likePost'])->name('like');

Route::get('/who_liked', [LikeController::class, 'who_liked'])->name('who_liked');

Route::post('/save-edited-post', [UserController::class, 'saveEditedPost'])->name('save.edited.post');

Route::post('/updtatepost', [UserController::class, 'updtatepost'])->name('updtatepost');

Route::get('/follow', [LikeController::class, 'follow'])->name('follow');

Route::get('/photos', [UserController::class, 'photos'])->name('photos');

Route::get('/navbarmenu', [UserController::class, 'navbarmenus'])->name('navbarmenu');

Route::post('/bio', [UserController::class, 'bio'])->name('bio');

Route::get('/following', [UserController::class, 'following'])->name('following');

Route::post('/settings', [UserController::class, 'settings'])->name('settings');

Route::get('/search', [UserController::class, 'search'])->name('search');

Route::post('/comment', [UserController::class, 'comments'])->name('comment');

Route::post('/post/comment/{post_id}', [UserController::class, 'postComment'])->name('post_comment');

Route::post('/add_reply/{post_id}', [UserController::class, 'addReply'])->name('add_reply');














