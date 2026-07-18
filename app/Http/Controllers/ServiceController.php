<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        return redirect()->route('wellbeing.programmes');
    }
}
