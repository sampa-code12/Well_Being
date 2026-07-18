<?php

namespace App\Http\Controllers;

class DemandeServiceController extends Controller
{
    public function index()
    {
        return redirect()->route('wellbeing.programmes');
    }
}
