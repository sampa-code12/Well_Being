<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_ajax_contact_submission_returns_redirect_url(): void
    {
        config(['services.whatsapp.support_number' => '237690000000']);

        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])->postJson('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Sujet de test',
            'message' => 'Bonjour, ceci est un message de test suffisant pour la validation.',
        ]);

        $response->assertOk()
            ->assertJsonStructure(['redirect', 'message'])
            ->assertJsonPath('message', 'Votre message a été préparé pour WhatsApp.');

        $this->assertStringContainsString('https://wa.me/237690000000?text=', $response->json('redirect'));
    }
}
