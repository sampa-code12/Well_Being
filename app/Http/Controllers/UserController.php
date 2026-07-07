<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //liste de tout les utilisateurs
        $allUsers = User::all();
        // comptage des utilisateurs
        $countUsers = User::count();

        return view('users.list',compact('allUsers','countUsers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
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
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'tel'=>$request->tel,
            'pays'=>$request->pays,
            'ville'=>$request->ville,
            'profession'=>$request->profession,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return redirect()->route('users.list')->with('succes','membre cree ajoute succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.detail-list',compact('user'));
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Auth::user()->role == Role::ADMIN){
        $user->delete();
        return redirect()->route('users.list')->with('succes','membre supprime avec succes');
        }
        return redirect()->route('index')->with('message','acces reserve aux administrateur');
    }
}
