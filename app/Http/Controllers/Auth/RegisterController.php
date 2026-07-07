<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     */
    public function RegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nom'=>'required|string|min:2',
            'prenom'=>'required|string|min:2',
            'tel'=>'required|string|min:9',
            'pays'=>'required|string',
            'ville'=>'required|string',
            'profession'=>'required|string',
            'email'=>'required|string|min:10',
            'password'=>'required|string|min:10|confirmed',
        ]);

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'pays' => $request->pays,
            'ville' => $request->ville,
            'profession' => $request->profession,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->intended(route('login.form'))->with('succes','inscription effectue avec succes');
    }

    }
