<?php

namespace App\Http\Controllers;

use App\Enums\StatusAvis;
use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function listeAvis(){
        $toutAvis = Avis::all();
        return view('avis.list', compact('toutAvis'));
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
            'contenu'=>$request->contenu,
            'user_id'=>auth()->user()->idUser,
            'StatusModeration'=>StatutAvis::VISIBLE,
        ]);

        return redirect()->route('avis.list')->with('succes','avis envoye avec succes');
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
