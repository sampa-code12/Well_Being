<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\StatutAvis;
use App\Models\Avis;
use App\Models\Message;
use App\Models\SystemSetting;
use App\Models\User;
use App\Services\WellBeingProgramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(private readonly WellBeingProgramService $programService)
    {
    }

    public function dashboard()
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $totalUsers = User::count();
        $totalMembers = User::where('role', Role::MEMBRE)->count();
        $totalAdmins = User::where('role', Role::ADMIN)->count();
        $totalProgrammes = count($this->programService->axes());
        $totalAvis = Avis::count();
        $totalMessages = Message::count();

        $recentUsers = User::latest('created_at')->take(5)->get();
        $recentAvis = Avis::with('user')->where('status_avis', StatutAvis::VISIBLE->value)->latest('created_at')->take(5)->get();
        $recentMessages = Message::with('user')->latest('created_at')->take(5)->get();
        $metrics = $this->programService->dashboardMetrics();
        $axes = $this->programService->axes();

        return view('admin.dashboard', compact(
            'user',
            'totalUsers',
            'totalMembers',
            'totalAdmins',
            'totalProgrammes',
            'totalAvis',
            'totalMessages',
            'recentUsers',
            'recentAvis',
            'recentMessages',
            'metrics',
            'axes'
        ));
    }

    public function users()
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $users = User::orderByDesc('created_at')->get();
        $promotableUserIds = User::eligibleForAdminPromotion()->pluck('idUser')->all();

        return view('admin.users', compact('users', 'promotableUserIds'));
    }

    public function promote(User $user)
    {
        $admin = Auth::user();
        abort_unless($admin && $admin->estAdmin(), 403);

        if ($admin->idUser === $user->idUser) {
            return redirect()->route('admin.users')->with('error', 'Vous ne pouvez pas promouvoir votre propre compte.');
        }

        if ($user->role === Role::ADMIN) {
            return redirect()->route('admin.users')->with('error', 'Cet utilisateur est déjà administrateur.');
        }

        $user->update([
            'role' => Role::ADMIN,
            'promoted_by' => $admin->idUser,
        ]);

        return redirect()->route('admin.users')->with('success', 'Utilisateur promu administrateur avec succès.');
    }

    public function demote(User $user)
    {
        $admin = Auth::user();
        abort_unless($admin && $admin->estAdmin(), 403);

        if ($admin->idUser === $user->idUser) {
            return redirect()->route('admin.users')->with('error', 'Vous ne pouvez pas retirer vos propres droits.');
        }

        if ($user->role !== Role::ADMIN) {
            return redirect()->route('admin.users')->with('error', 'Cet utilisateur n’est pas administrateur.');
        }

        if ($admin->promoted_by && $admin->promoted_by === $user->idUser) {
            abort(403, 'Vous ne pouvez pas retirer les droits de la personne qui vous a nommé administrateur.');
        }

        $user->update([
            'role' => Role::MEMBRE,
            'promoted_by' => null,
        ]);

        return redirect()->route('admin.users')->with('success', 'Droits d’administrateur retirés avec succès.');
    }

    public function destroy(User $user)
    {
        $admin = Auth::user();
        abort_unless($admin && $admin->estAdmin(), 403);

        if ($admin->idUser === $user->idUser) {
            return redirect()->route('admin.users')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function avis()
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $avis = Avis::with('user')->orderByDesc('created_at')->get();

        return view('admin.avis', compact('avis'));
    }

    public function messages()
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $messages = Message::with('user')->orderByDesc('created_at')->get();

        return view('admin.messages', compact('messages'));
    }

    public function profile()
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->idUser . ',idUser',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil administrateur mis à jour.');
    }

    public function replyMessage(Request $request, Message $message)
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $data = $request->validate([
            'reponse' => 'required|string|max:2000',
        ]);

        $message->update([
            'reponse' => $data['reponse'],
            'repondu_par' => $user->idUser,
        ]);

        return redirect()->route('admin.messages')->with('success', 'Réponse enregistrée avec succès.');
    }

    public function settings()
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $settings = [
            'services_visible' => SystemSetting::getBool('services_visible', true),
            'messages_enabled' => SystemSetting::getBool('messages_enabled', true),
            'avis_enabled' => SystemSetting::getBool('avis_enabled', true),
        ];

        return view('admin.settings', compact('user', 'settings'));
    }

    public function saveSettings(Request $request)
    {
        $user = Auth::user();
        abort_unless($user && $user->estAdmin(), 403);

        $request->validate([
            'services_visible' => 'nullable|boolean',
            'messages_enabled' => 'nullable|boolean',
            'avis_enabled' => 'nullable|boolean',
        ]);

        SystemSetting::setValue('services_visible', $request->boolean('services_visible') ? '1' : '0');
        SystemSetting::setValue('messages_enabled', $request->boolean('messages_enabled') ? '1' : '0');
        SystemSetting::setValue('avis_enabled', $request->boolean('avis_enabled') ? '1' : '0');

        return redirect()->route('admin.settings')->with('success', 'Paramètres système mis à jour.');
    }
}
