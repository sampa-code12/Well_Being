<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Message;
use App\Services\WellBeingProgramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function __construct(private readonly WellBeingProgramService $programService)
    {
    }

    public function dashboard()
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

        $avis = $user->avis()->latest()->take(5)->get();
        $messages = $user->messages()->latest()->take(5)->get();
        $demandes = collect();
        $programmesDisponibles = count($this->programService->axes());
        $messagesEnvoyes = $user->messages()->count();
        $avisPublies = $user->avis()->count();
        $axes = $this->programService->axes();
        $objectives = $this->programService->objectives();

        return view('membre.dashboard', compact(
            'user',
            'avis',
            'messages',
            'demandes',
            'programmesDisponibles',
            'messagesEnvoyes',
            'avisPublies',
            'axes',
            'objectives'
        ));
    }

    public function profile()
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

        return view('membre.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

        return view('membre.profile_edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

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
            $data['password'] = Hash::make($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('membre.profile')->with('success', 'Profil mis à jour.');
    }

    public function messages()
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

        $messages = Message::where('user_id', $user->idUser)
            ->orderByDesc('created_at')
            ->get();

        return view('membre.messages', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

        if (!\App\Models\SystemSetting::getBool('messages_enabled', true)) {
            return redirect()->route('membre.messages')->with('error', 'L’envoi de messages est momentanément désactivé par l’administrateur.');
        }

        $data = $request->validate([
            'contenu' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => $user->idUser,
            'contenu' => $data['contenu'],
            'envoye_par' => Role::MEMBRE,
        ]);

        return redirect()->route('membre.messages')->with('success', 'Message envoyé.');
    }

    public function favorites()
    {
        $user = Auth::user();
        abort_unless($user && $user->estMembre(), 403);

        return view('membre.favorites');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect('/')->with('success', 'Vous êtes déconnecté.');
    }
}
