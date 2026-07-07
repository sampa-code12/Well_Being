<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\StatutDemande;
use App\Models\DemandeService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == Role::ADMIN){
            $allRequestService =  DemandeService::all();
            return view('demandeService.list',compact('allRequestService'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createRequestServiceForm()
    {
        return view('demandeService.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeRequestService(Request $request,User $user,Service $service)
    {
        $request->validate([
            'dateCommande'=>'required|date',
        ]);

        DemandeService::create([
            'dateCommande'=>now(),
            'service_id'=>$service->getKey(),
            'user_id'=>$user->getKey(),
            'statut_commande'=>StatutDemande::EN_ATTENTE,
        ]);

        return redirect()->route('services.list')->with('succes','demande pour ce service envoye avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
