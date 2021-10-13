<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('home');
Route::get('/post/{slug}', [App\Http\Controllers\BlogController::class, 'postBySlug'])->name('post');
Route::post('/post/search', [App\Http\Controllers\BlogController::class, 'postSearch'])->name('post.search');
Route::get('/category/{slug}', [App\Http\Controllers\BlogController::class, 'postByCategorySlug'])->name('category');
Route::post('/comment', [App\Http\Controllers\BlogController::class, 'storeComment'])->name('post.create.comment');
Route::get('/permission_error', [App\Http\Controllers\BlogController::class, 'showPermissionErrorPage'])->name('permission');

Auth::routes();

Route::group(['prefix' => 'user', 'middleware' => ['user.auth']], function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('post.index');
    Route::get('/post/create', [\App\Http\Controllers\UserController::class, 'postCreate'])->name('post.create');
    Route::get('post/{id}', [\App\Http\Controllers\UserController::class, 'postEdit'])->name('post.edit');
    Route::post('post', [\App\Http\Controllers\UserController::class, 'postStore'])->name('post.store');
    Route::post('post/{id}', [\App\Http\Controllers\UserController::class, 'postUpdate'])->name('post.update');
    Route::delete('post/{id}', [\App\Http\Controllers\UserController::class, 'postDestroy'])->name('post.delete');

    Route::get('post/comment/{id}', [\App\Http\Controllers\UserController::class, 'postComment'])->name('post.comment');
    Route::get('post/comment/show/{id}', [\App\Http\Controllers\UserController::class, 'commentShow'])->name('post.comment.show');
    Route::get('post/comment/edit/{id}', [\App\Http\Controllers\UserController::class, 'commentEdit'])->name('post.comment.edit');
    Route::post('post/comment/update/{id}', [\App\Http\Controllers\UserController::class, 'commentUpdate'])->name('post.comment.update');
    Route::delete('post/comment/delete/{id}', [\App\Http\Controllers\UserController::class, 'commentDestroy'])->name('post.comment.delete');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'index'])->name('users.list');
    Route::get('user/create', [\App\Http\Controllers\AdminController::class, 'userCreate'])->name('user.create');
    Route::post('user/store', [\App\Http\Controllers\AdminController::class, 'userStore'])->name('user.store');
    Route::get('user/{id}', [\App\Http\Controllers\AdminController::class, 'userEdit'])->name('user.edit');
    Route::delete('user/{id}', [\App\Http\Controllers\AdminController::class, 'userDestroy'])->name('user.delete');
    Route::post('user/update/{id}', [\App\Http\Controllers\AdminController::class, 'userUpdate'])->name('user.update');
    Route::get('user/change-password/{id}', [\App\Http\Controllers\AdminController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('user/update-password/{id}', [\App\Http\Controllers\AdminController::class, 'userUpdatePassword'])->name('user.update.password');
});
