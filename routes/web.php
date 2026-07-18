<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\WellBeingController;
use App\Services\WellBeingProgramService;
use Illuminate\Support\Facades\Route;


//ROUTES INSCRIPTION
Route::get('/register-form', [RegisterController::class ,'RegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class ,'register'])->name('register.post');

//ROUTE AUTHENTIFICATION
Route::post('/login-form', [LoginController::class,'login'])->name('login.post');
Route::get('/login-form', [LoginController::class,'LoginForm'])->name('login.form');
Route::get('/login', [LoginController::class,'LoginForm'])->name('login');



Route::get('/', function () {
    $programService = app(WellBeingProgramService::class);
    $axes = $programService->axes();
    return view('index', compact('axes'));
});

Route::get('/apropos', function () {
    return view('apropos');
});

Route::get('/programmes', [WellBeingController::class, 'index'])->name('wellbeing.programmes');

Route::get('/contact', function () {
    return view('contact');
});

Route::redirect('/services', '/programmes');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/avis', [AdminController::class, 'avis'])->name('admin.avis');
    Route::get('/admin/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::post('/admin/messages/{message}/reply', [AdminController::class, 'replyMessage'])->name('admin.messages.reply');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'saveSettings'])->name('admin.settings.save');

    Route::get('/membre/dashboard', [MemberController::class, 'dashboard'])->name('membre.dashboard');
    Route::get('/membre/profile', [MemberController::class, 'profile'])->name('membre.profile');
    Route::get('/membre/profile/edit', [MemberController::class, 'editProfile'])->name('membre.profile.edit');
    Route::put('/membre/profile', [MemberController::class, 'updateProfile'])->name('membre.profile.update');
    Route::get('/membre/messages', [MemberController::class, 'messages'])->name('membre.messages');
    Route::post('/membre/messages', [MemberController::class, 'sendMessage'])->name('membre.messages.send');
    Route::get('/membre/favorites', [MemberController::class, 'favorites'])->name('membre.favorites');
    Route::post('/logout', [MemberController::class, 'logout'])->name('logout');

    // Avis
    Route::get('/avis', [AvisController::class, 'listeAvis'])->name('avis.list');
    Route::post('/avis', [AvisController::class, 'creerAvis'])->name('avis.store');
    Route::get('/avis/{avis}', [AvisController::class, 'detailAvis'])->name('avis.show');
    Route::put('/avis/{avis}', [AvisController::class, 'miseAjourAvis'])->name('avis.update');
});
