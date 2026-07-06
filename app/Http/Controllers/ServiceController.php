<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function AfficherTousServices()
    {
        $allServices = Service::all();
        return view('services.list',compact('allServices'));

    }

    public function AfficherDetailService(Service $service)
    {
        return view('services.detail-service',compact('service'));
    }

    public  function CreerService(Request $request){
        $request->validate([
            'titre'=>'required|string|min:3',
            'description'=>'required|string|min:10',
            'image_url'=>'nullable'
        ]);

        Service::create($request->all());

        return redirect()->route('list-service')->with('succes','service creer avec succes');
    }

    public function MettreAjourService(Request $request,Service $service)
    {
        $request->validate([
            'titre'=>'required|string|min:3',
            'description'=>'required|string|min:10',
            'image_url'=>'nullable'
        ]);

        $service->update($request->all());
        return redirect()->route('list-service')->with('succes',"service {$request->titre} mis a jour avec succes");
    }

    public function SupprimerService(Service $service)
    {
        $service->delete();
        return redirect()->route('list-service')->with('succes','service supprime avec succes');
    }
}
