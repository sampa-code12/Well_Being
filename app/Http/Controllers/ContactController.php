<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use Illuminate\Http\Request;

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

        $supportNumber = SystemSetting::getValue('whatsapp_support_number');

        if (blank($supportNumber)) {
            $supportNumber = config('services.whatsapp.support_number');
        }

        if (blank($supportNumber)) {
            return back()->withErrors(['email' => 'Le numéro de support WhatsApp n’est pas configuré.'])->withInput();
        }

        $normalizedNumber = preg_replace('/\D/', '', (string) $supportNumber);

        if (blank($normalizedNumber)) {
            return back()->withErrors(['email' => 'Le numéro de support WhatsApp est invalide.'])->withInput();
        }

        $message = rawurlencode(
            "Bonjour, je m'appelle {$validated['name']} ({$validated['email']}).\nSujet : {$validated['subject']}\n\n{$validated['message']}"
        );

        return redirect()->to("https://wa.me/{$normalizedNumber}?text={$message}")
            ->with('success', 'Votre message a été préparé pour WhatsApp.');
    }
}
