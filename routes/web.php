<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomaineController;


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
Route::get('/', [HomeController::class, 'index'])->name('front.home');


Route::get('/expert', function () {
    return view('Expert.interface');
})->middleware('auth')->name('expert');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/inscription', [AuthController::class, 'inscription'])->name('inscription');
    Route::post('/registration-user',[AuthController::class, 'registerUser'])->name('register-user');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
//dasboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth', 'role.redirect');
//gestion domain 
Route::resource('domaines', DomaineController::class);
#partie lamis expert ihana i5dim lamis 7ot les rout imta3 les grud ta7t dossier ili isna3yholik fil view partie_lamis
#test