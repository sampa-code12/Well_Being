<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\DemandeServiceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


//ROUTES INSCRIPTION
Route::get('/register-form', [RegisterController::class ,'RegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class ,'register'])->name('register.post');

//ROUTE AUTHENTIFICATION
Route::post('/login-form', [LoginController::class,'login'])->name('login.post');
Route::get('/login', [LoginController::class,'LoginForm'])->name('login.form');



Route::get('/', function () {
    return view('index');
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
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');

    Route::get('/admin/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/admin/services', [ServiceController::class, 'AfficherTousServices'])->name('admin.services.index');
    Route::get('/admin/services/creer', function () {
        return view('admin.services.create');
    })->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'CreerService'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', function () {
        return view('admin.services.edit');
    })->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'MettreAjourService'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'SupprimerService'])->name('admin.services.destroy');

    Route::get('/admin/avis', function () {
        return view('admin.avis');
    })->name('admin.avis');

    Route::get('/admin/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

    Route::get('/membre/dashboard', function () {
        $user = Auth::user();

        if (! $user || ! $user->estMembre()) {
            abort(403);
        }

        $demandes = $user->demande_services()->with('services')->latest('dateCommande')->take(5)->get();
        $avis = $user->avis()->latest()->take(5)->get();
        $servicesDisponibles = \App\Models\Service::count();
        $demandesEnAttente = $user->demande_services()->where('statut_demande', 'en_attente')->count();
        $demandesTraites = $user->demande_services()->whereIn('statut_demande', ['recu', 'en_traitement', 'accepte'])->count();

        return view('membre.dashboard', compact(
            'user',
            'demandes',
            'avis',
            'servicesDisponibles',
            'demandesEnAttente',
            'demandesTraites'
        ));
    })->name('membre.dashboard');

    Route::get('/membre/profile', function () {
        $user = Auth::user();

        if (! $user || ! $user->estMembre()) {
            abort(403);
        }

        return view('membre.profile', compact('user'));
    })->name('membre.profile');

    Route::get('/membre/profile/edit', function () {
        $user = Auth::user();

        if (! $user || ! $user->estMembre()) {
            abort(403);
        }

        return view('membre.profile_edit', compact('user'));
    })->name('membre.profile.edit');

    Route::put('/membre/profile', function (Request $request) {
        $user = Auth::user();

        if (! $user || ! $user->estMembre()) {
            abort(403);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->idUser . ',idUser',
            'tel' => 'nullable|string|max:30',
            'profession' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('membre.profile')->with('success', 'Profil mis à jour.');
    })->name('membre.profile.update');

    Route::get('/membre/services', function () {
        $user = Auth::user();

        if (! $user || ! $user->estMembre()) {
            abort(403);
        }

        $services = $user->demande_services()->with('services')->latest('dateCommande')->get();

        return view('membre.services', compact('user', 'services'));
    })->name('membre.services');

    Route::get('/membre/messages', function () {
        return view('membre.messages');
    })->name('membre.messages');

    Route::get('/membre/favorites', function () {
        return view('membre.favorites');
    })->name('membre.favorites');

    Route::post('/logout', function (Request $request) {
        $user = Auth::user();

        if ($user) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect('/')->with('success', 'Vous êtes déconnecté.');
    })->name('logout');

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
