<?php

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
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('/question_decryption', [App\Http\Controllers\Admin\QuestionDecryptionController::class, 'index'])->name('question_decryption.index');
        Route::post('/question_decryption', [App\Http\Controllers\Admin\QuestionDecryptionController::class, 'update'])->name('question_decryption.update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('post/{slug}', [App\Http\Controllers\PostsController::class, 'show'])->name('post');
Route::resource('tests', App\Http\Controllers\TestsController::class)->only(['index', 'store']);
