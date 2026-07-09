<?php

namespace App\Http\Controllers;

use App\Enums\StatutAvis;
use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function listeAvis(Request $request)
    {
        $query = Avis::with('user')->latest();

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date('date'));
        }

        if ($request->filled('status')) {
            $query->where('status_avis', $request->input('status'));
        }

        $toutAvis = $query->get();
        $statuses = collect(StatutAvis::cases())->mapWithKeys(fn ($status) => [$status->value => $status->label()]);

        return view('avis.list', compact('toutAvis', 'statuses'));
    }

    public function detailAvis(Avis $avis){
        return view('avis.detail-avis',compact('avis'));
    }

    public function creerAvis(Request $request){
        if (!\App\Models\SystemSetting::getBool('avis_enabled', true)) {
            return redirect()->route('avis.list')->with('error','Les avis sont momentanément désactivés par l’administrateur.');
        }

        $request->validate([
            'contenu'=>'required|string|min:20',
        ]);

        Avis::create([
            'contenu' => $request->contenu,
            'user_id' => auth()->user()->idUser,
            'status_avis' => StatutAvis::VISIBLE->value,
        ]);

        $redirect = $request->input('redirect_to') ?: route('avis.list');
        return redirect($redirect)->with('succes', 'Avis envoyé avec succès');
    }

    public function miseAjourAvis(Request $request,Avis $avis){
        $request->validate([
            'contenu'=>'required|string|min:20',
        ]);

        if(!$this->verifierDelaiModifAvis($avis)){
            return redirect()->back()->with('error','le delai (15 minutes) de modification est depassee');
        }

        $avis->update([
            'contenu'=>$request->contenu,
        ]);
    }

    public function  verifierDelaiModifAvis(Avis $avis):bool
    {
        return $avis->created_at->addMinutes(15)->greatherThan(now());
    }
}
