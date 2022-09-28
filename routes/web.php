<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/search', function(){
    return view('search-dropdown');
})->name('search-dropdown');

Route::get('/users', function(){
    return view('users-table', [
        'users' => User::paginate(15)
    ]);
})->name('users-table');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'post'])->name('contact.post');

Route::get('/post/{post}', [PostController::class, 'index'])->name('post.show');
Route::post('/post/{post}/comment', [PostController::class, 'store'])->name('comment.store');