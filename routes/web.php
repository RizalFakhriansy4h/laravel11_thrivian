<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommunityController;

// sudah login
Route::middleware(['auth'])->group(function () {

    Route::get('/logged', function () {
        return redirect(route('profile'));
    })->name('after.login');

    Route::get('/profile', [MainController::class, 'setViewprofile'])->name('profile');

    Route::get('/settings', [MainController::class, 'setViewsettings'])->name('settings');
    
    Route::get('/home', [MainController::class, 'setViewhome'])->name('home');
    
    Route::get('/community', [MainController::class, 'setViewCommunity'])->name('community');

    Route::post('/update-profile', [MainController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password', [MainController::class, 'updatePassword'])->name('password.update');



    Route::post('/post', [PostController::class, 'uploadPost'])->name('uploadPost');
    Route::post('/like-post', [PostController::class, 'likePost'])->name('like.post');
    Route::post('/bookmark-post', [PostController::class, 'bookmarkPost'])->name('bookmark.post');


    Route::post('/communities', [CommunityController::class, 'requestCommunity'])->name('requestCommunity');




    
    // login dan rolenya sebagai admin
    Route::middleware(['adminCheck'])->group(function (){
        Route::get('/admin/community', [AdminController::class, 'setViewTableCommunity'])->name('tableCommunity');
        Route::get('/admin/event', [AdminController::class, 'setViewTableEvent'])->name('tableEvent');
        Route::get('/admin/user', [AdminController::class, 'setViewTableUser'])->name('tableUser');

        Route::post('/community/accept', [CommunityController::class, 'acceptCommunity'])->name('acceptCommunity');



    });



    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




});

// belum login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'setViewLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'setViewRegister'])->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    
    Route::get('/auth/google',[AuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback',[AuthController::class, 'handleGoogleCallback']);

    Route::get('/otp', function (Request $request) {
        $email = $request->query('email');
        return view('otp_form', compact('email'));
    })->name('otp.form');

    Route::post('/verify-otp',[AuthController::class, 'verifyotp'])->name('verify.otp');


});



// halaman apa saja yang bisa diakses user jika dia belum login
Route::get('/', function () {

    // return redirect(route('login'));
    return redirect(route('intro'));

});

Route::get('/introduction', function () {

    return view('intro');

})->name('intro');


