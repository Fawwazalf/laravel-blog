<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PostImageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController as ControllersBlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostImageController as ControllersPostImageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialiteController;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('blog/{id}', [ControllersBlogController::class, 'show'])->name('detail.blog');
Route::get('post-image/{id}', [ControllersPostImageController::class, 'show'])->name('detail.post-image');
Route::get('/', [ControllersBlogController::class, 'index'])->name('index');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('dashboard/blogs',BlogController::class)->middleware('auth');
Route::resource('dashboard/post-images', PostImageController::class)->middleware('auth');
Route::post('/comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');



Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('/auth/{provider}', [SocialiteController::class, 'redirect'])->name('login.provider');

Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');