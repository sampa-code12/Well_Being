<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function LoginForm()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|string|min:10',
            'password'=>'required|string|min:10',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('register.form')->with('message', 'Compte introuvable ! Veuillez vous inscrire s\'il vous plaît.');
        }

        $isValidPassword = Hash::check($request->password, $user->password);

        if (!$isValidPassword && $request->password === $user->password) {
            $user->password = Hash::make($request->password);
            $user->save();
            $isValidPassword = true;
        }

        if (!$isValidPassword) {
            return back()->withErrors([
                'password' => 'Mot de passe incorrect, veuillez réessayer.'
            ])->withInput($request->except('password'));
        }

        Auth::login($user);
        if($user->role == Role::ADMIN){
            return redirect()->route('admin.dashboard')->with('succes','Connexion a votre compte Well Being reussi');
        }else if($user->role ==  Role::MEMBRE){
            return redirect()->route('membre.dashboard')->with('succes','Connexion a votre compte Well Being reussi');
        }
        return redirect()->route('index')->with('error','Erreur survenu lors de la connexion a votre compte! svp veuillez contacter l\'administrateur');
    }

}
