<?php

namespace Tests\Feature;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_contact_form_stores_message(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Amina',
            'email' => 'amina@example.com',
            'subject' => 'Besoin d’informations',
            'message' => 'Je souhaite rejoindre les programmes de bien-être.',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');
        $this->assertDatabaseHas('messages', [
            'envoye_par' => 'visiteur',
        ]);
        $this->assertTrue(Message::where('envoye_par', 'visiteur')->exists());
    }
}
