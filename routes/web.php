<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommunityController;

// sudah login
Route::middleware(['auth'])->group(function () {

    Route::get('/logged', function () {
        return redirect(route('profile'));
    })->name('after.login');

    Route::get('/profile', [MainController::class, 'setViewprofile'])->name('profile');
    Route::get('/profile/{username}', [MainController::class, 'setViewProfileByUsername'])->name('profile.people');

    Route::get('/settings', [MainController::class, 'setViewsettings'])->name('settings');
    
    Route::get('/home', [MainController::class, 'setViewhome'])->name('home');
    
    Route::get('/community', [MainController::class, 'setViewCommunity'])->name('community');
    Route::get('/community/{slug}', [CommunityController::class, 'detail'])->name('community.detail');
    
    Route::get('/homeevent', [MainController::class, 'setViewHomeEvent'])->name('homeEvent');
    Route::get('/event', [MainController::class, 'setViewEvent'])->name('event');
    Route::get('/event/{slug}', [EventController::class, 'detail'])->name('event.detail');
    
    Route::post('/update-profile', [MainController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password', [MainController::class, 'updatePassword'])->name('password.update');
    
    
    Route::get('/addpost', [PostController::class, 'setViewPost'])->name('viewpost');
    
    Route::post('/post', [PostController::class, 'uploadPost'])->name('uploadPost');
    Route::get('/post/{slug}', [PostController::class, 'detail'])->name('post.detail');
    Route::post('/comments', [PostController::class, 'store'])->name('comments.store');


    Route::post('/like-post', [PostController::class, 'likePost'])->name('like.post');
    Route::post('/bookmark-post', [PostController::class, 'bookmarkPost'])->name('bookmark.post');
    
    
    Route::get('/addcommunity', [CommunityController::class, 'setViewCommunity'])->name('viewcommunity');
    
    Route::post('/requestcommunity', [CommunityController::class, 'requestCommunity'])->name('requestCommunity');
    
    Route::post('/event/join', [EventController::class, 'joinEvent'])->name('event.join');
    
    Route::post('/follow/{user}', [MainController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [MainController::class, 'unfollow'])->name('unfollow');
    
    Route::post('/community/join', [CommunityController::class, 'joinCommunity'])->name('community.join');
    Route::post('/community/leave', [CommunityController::class, 'leaveCommunity'])->name('community.leave');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


    Route::post('/requestevent', [EventController::class, 'requestEvent'])->name('requestEvent');
    
    Route::group(['middleware' => ['auth', 'isAdminCommunity']], function() {
        
        
    });
    
    Route::middleware(['auth', 'isMemberCommunity'])->group(function () {
        
        Route::get('/community/{slug}/addevent', [CommunityController::class, 'addEventToCommunity'])->name('community.addevent');
        
        Route::get('/community/{slug}/addpost', [CommunityController::class, 'postToCommunity'])->name('community.post');
        Route::post('/community/{slug}/addpost', [CommunityController::class, 'storePostToCommunity'])->name('community.post.store');
        
    });
    
    
    
    
    
    // login dan rolenya sebagai admin
    Route::middleware(['adminCheck'])->group(function (){
        Route::get('/admin/community', [AdminController::class, 'setViewTableCommunity'])->name('tableCommunity');
        Route::get('/admin/event', [AdminController::class, 'setViewTableEvent'])->name('tableEvent');
        Route::get('/admin/user', [AdminController::class, 'setViewTableUser'])->name('tableUser');
        
        Route::get('/addevent', [EventController::class, 'setViewEvent'])->name('viewevent');

        Route::post('/community/accept', [CommunityController::class, 'acceptCommunity'])->name('acceptCommunity');
        
        Route::post('/event/accept', [EventController::class, 'acceptEvent'])->name('acceptEvent');

        Route::post('/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('makeAdmin');



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

Route::get('/privacyterms', function () {

    return view('privacy_terms');

})->name('privacy');


