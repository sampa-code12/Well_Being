<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\DemandeServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


//ROUTES INSCRIPTION
Route::get('/register-form', [RegisterController::class ,'RegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class ,'register'])->name('register.post');

//ROUTE AUTHENTIFICATION
Route::post('/login-form', [LoginController::class,'login'])->name('login.post');
Route::get('/login-form', [LoginController::class,'LoginForm'])->name('login.form');
Route::get('/login', [LoginController::class,'LoginForm'])->name('login');



Route::get('/', function () {
    $services = Service::latest()->take(4)->get();
    return view('index', compact('services'));
});

Route::get('/apropos', function () {
    return view('apropos');
});

Route::get('/contact', function () {
    return view('contact');
});

// Routes publiques de services
Route::get('/services', [ServiceController::class, 'AfficherTousServices'])->name('services.list');
Route::get('/services/{service}', [ServiceController::class, 'AfficherDetailService'])->name('services.show');

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

    Route::get('/admin/services', function () {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    })->name('admin.services.index');
    Route::get('/admin/services/creer', function () {
        return view('admin.services.create');
    })->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'CreerService'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', function (Service $service) {
        return view('admin.services.edit', compact('service'));
    })->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'MettreAjourService'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'SupprimerService'])->name('admin.services.destroy');

    Route::get('/membre/dashboard', [MemberController::class, 'dashboard'])->name('membre.dashboard');
    Route::get('/membre/profile', [MemberController::class, 'profile'])->name('membre.profile');
    Route::get('/membre/profile/edit', [MemberController::class, 'editProfile'])->name('membre.profile.edit');
    Route::put('/membre/profile', [MemberController::class, 'updateProfile'])->name('membre.profile.update');
    Route::get('/membre/services', [MemberController::class, 'services'])->name('membre.services');
    Route::get('/membre/messages', [MemberController::class, 'messages'])->name('membre.messages');
    Route::post('/membre/messages', [MemberController::class, 'sendMessage'])->name('membre.messages.send');
    Route::get('/membre/favorites', [MemberController::class, 'favorites'])->name('membre.favorites');
    Route::post('/logout', [MemberController::class, 'logout'])->name('logout');

    // Avis
    Route::get('/avis', [AvisController::class, 'listeAvis'])->name('avis.list');
    Route::post('/avis', [AvisController::class, 'creerAvis'])->name('avis.store');
    Route::get('/avis/{avis}', [AvisController::class, 'detailAvis'])->name('avis.show');
    Route::put('/avis/{avis}', [AvisController::class, 'miseAjourAvis'])->name('avis.update');

    // Demandes de service
    Route::get('/demandes-services', [DemandeServiceController::class, 'index'])->name('demandes.index');
    Route::get('/demandes-services/creer', [DemandeServiceController::class, 'createRequestServiceForm'])->name('demandes.create');
    Route::post('/demandes-services', [DemandeServiceController::class, 'storeRequestService'])->name('demandes.store');
});
