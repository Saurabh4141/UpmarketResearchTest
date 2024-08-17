<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('index');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/create', [UserController::class, 'index'])->name('create');
    Route::post('/create', [UserController::class, 'createUserForm'])->name('createUserForm');

    Route::get('/list', [UserController::class, 'view'])->name('view');
    Route::post('/list', [UserController::class, 'list'])->name('list');

    Route::get('/update', [UserController::class, 'update'])->name('update');
    Route::post('/update', [UserController::class, 'updateForm'])->name('updateForm');

    Route::post('/permanentdelete', [UserController::class, 'permanentdelete'])->name('permanentdelete');
    Route::post('/delete', [UserController::class, 'delete'])->name('delete');
});