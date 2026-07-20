<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_contact_form_redirects_to_whatsapp(): void
    {
        config()->set('services.whatsapp.support_number', '+237690000000');

        $response = $this->post(route('contact.store'), [
            'name' => 'Amina',
            'email' => 'amina@example.com',
            'subject' => 'Besoin d’informations',
            'message' => 'Je souhaite rejoindre les programmes de bien-être.',
        ]);

        $response->assertRedirectContains('wa.me/237690000000');
        $response->assertSessionHas('success', 'Votre message a été préparé pour WhatsApp.');
    }
}
