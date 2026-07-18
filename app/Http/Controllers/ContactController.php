<?php

namespace App\Http\Controllers;

use App\Mail\ContactSupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:4000'],
        ], [
            'name.required' => 'Votre nom est obligatoire.',
            'email.required' => 'Votre adresse e-mail est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'subject.required' => 'Le sujet est obligatoire.',
            'message.required' => 'Le message est obligatoire.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ]);

        $supportAddress = config('mail.from.address');

        if (blank($supportAddress) || !filter_var($supportAddress, FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['email' => 'L’adresse de support n’est pas configurée.'])->withInput();
        }

        $mailable = new ContactSupportMail(
            $validated['name'],
            $validated['email'],
            $validated['message'],
        );

        Mail::to($supportAddress)->send($mailable);

        return redirect()->route('contact')->with('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
