<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [UserController::class, 'index']);
Route::get('/logout', [UserController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {

    /** User Portal */
    Route::get('user/blog', [BlogController::class, 'getPosts'])->name('blogs.listing');
    Route::get('/blog', [BlogController::class, 'showPosts'])->name('blogs.index');;
    Route::post('/blog', [BlogController::class, 'createPost'])->name('blog.create');
    Route::get('/createpost', [BlogController::class, 'create'])->name('blog.show');
    Route::get('/post/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/post/edit', [BlogController::class, 'update'])->name('blog.update');
    Route::match(['get', 'post'], '/post/delete/', [BlogController::class, 'delete'])->name('blog.delete');
});
