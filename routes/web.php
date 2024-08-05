<?php

// use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServedController;
// use App\Http\Middleware\CrudUserAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = "تسجيل الدخول";
    $parent = "المستخدمين";
    return view('auth.login', compact('title','parent'));
});


/// users
Route::group(['prefix' => 'users', "controller" => UserController::class, "as" => "user.", 'middleware' => ['auth']], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('deleted/{id}', 'destroy')->name('destroy');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('/trashed', 'trashed')->name('trashed');
    Route::get('showTrash/{id}', 'showTrash')->name('showTrash');
    Route::get('restore/{id}', 'restore')->name('restore');
});

/// served
Route::group(['prefix' => 'served', "controller" => ServedController::class, "as" => "served.", 'middleware' => ['auth']], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('deleted/{id}', 'destroy')->name('destroy');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('/trashed', 'trashed')->name('trashed');
    Route::get('showTrash/{id}', 'showTrash')->name('showTrash');
    Route::get('restore/{id}', 'restore')->name('restore');
});


Route::group(['prefix' => 'meetings', "controller" => MeetingController::class, "as" => "meeting.", 'middleware' => ['auth']], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('deleted/{id}', 'destroy')->name('destroy');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('/trashed', 'trashed')->name('trashed');
    Route::get('showTrash/{id}', 'showTrash')->name('showTrash');
    Route::get('restore/{id}', 'restore')->name('restore');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
