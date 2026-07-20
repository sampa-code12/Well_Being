<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function create()
    {
        return view('partners.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'nom_contact' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:partners,email',
            'telephone' => 'required|string|max:30',
            'pays' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'type_partenariat' => 'required|string|max:100',
            'message' => 'nullable|string',
        ]);

        Partner::create($data);

        return redirect('/')->with('partner_success', true);
    }
}
