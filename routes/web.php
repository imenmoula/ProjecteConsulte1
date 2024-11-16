<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home', function () {
    return view('front.home');
})->name('home');

Route::get('/expert', function () {
    return view('expert.interface');
})->name('expert');

Route::get('/admin/master', function () {
    return view('User.master');
})->name('admin');


Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/inscription', [AuthController::class, 'inscription'])->name('inscription');
    Route::post('/registration-user',[AuthController::class, 'registerUser'])->name('register-user');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
//dasboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth', 'role.redirect');
