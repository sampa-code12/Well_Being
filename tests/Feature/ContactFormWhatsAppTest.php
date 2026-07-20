<?php

namespace Tests\Feature;

use App\Models\SystemSetting;
use Tests\TestCase;

class ContactFormWhatsAppTest extends TestCase
{
    public function test_contact_form_redirects_to_whatsapp_with_pre_filled_message(): void
    {
        config()->set('services.whatsapp.support_number', '+237690000000');

        $response = $this->post('/contact', [
            'name' => 'Alicia',
            'email' => 'alicia@example.com',
            'subject' => 'Besoin d’aide',
            'message' => 'Je souhaite obtenir un accompagnement personnalisé.',
        ]);

        $response->assertRedirectContains('wa.me/237690000000');
        $response->assertSessionHas('success', 'Votre message a été préparé pour WhatsApp.');
    }

    public function test_contact_form_uses_whatsapp_number_from_system_settings(): void
    {
        config()->set('services.whatsapp.support_number', null);
        SystemSetting::setValue('whatsapp_support_number', '+237690000001');

        $response = $this->post('/contact', [
            'name' => 'Alicia',
            'email' => 'alicia@example.com',
            'subject' => 'Besoin d’aide',
            'message' => 'Je souhaite obtenir un accompagnement personnalisé.',
        ]);

        $response->assertRedirectContains('wa.me/237690000001');
    }
}
