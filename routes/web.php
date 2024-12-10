<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\FontController;
use App\Http\Controllers\RendiventController;
use App\Http\Controllers\AvailabilityController;

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
Route::get('/front', [HomeController::class, 'showfronT'])->name('front.showfront');
Route::get('/apropos', [HomeController::class, 'apropos'])->name('front.apropos');
Route::get('/expert/{id}', [HomeController::class, 'detailExpert'])->name('expert.detail');





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
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::resource('domaines', DomaineController::class);
Route::resource('experts', ExpertController::class);
// Afficher les disponibilités
// Route::resource('availabilities', AvailabilityController::class);


Route::get('/profiles/show', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profiles.show');
Route::get('/profiles/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profiles.update');
// Mettre à jour le mot de passe
//Route::put('/profile/password', [App\Http\Controllers\ProfilesController::class, 'updatePassword'])->name('profile.updatePassword');
// Liste des rendez-vous
/*Route::get('/consulte', [RendiventController::class, 'index'])->name('front.consulte.index');
Route::get('/consulte/{id}', [RendiventController::class, 'show'])->name('front.consulte.show');
Route::get('/consulte/create', [RendiventController::class, 'create'])->name('front.consulte.create');
Route::post('/consulte', [RendiventController::class, 'store'])->name('front.consulte.store');
Route::get('/consulte/{id}/edit', [RendiventController::class, 'edit'])->name('front.consulte.edit');
Route::put('/consulte/{id}', [RendiventController::class, 'update'])->name('front.consulte.update');
Route::delete('/consulte/{id}', [RendiventController::class, 'destroy'])->name('front.consulte.destroy');


