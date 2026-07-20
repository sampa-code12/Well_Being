<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_partner_can_register_and_be_redirected_to_home_with_success_modal(): void
    {
        $response = $this->post('/devenir-partenaire', [
            'nom_entreprise' => 'Well Motion',
            'nom_contact' => 'Alicia',
            'email' => 'partenaire@example.com',
            'telephone' => '+237690000000',
            'pays' => 'Cameroun',
            'ville' => 'Yaoundé',
            'type_partenariat' => 'finance',
            'message' => 'Nous souhaitons soutenir le programme.',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('partner_success', true);
        $this->assertDatabaseHas('partners', [
            'email' => 'partenaire@example.com',
            'nom_entreprise' => 'Well Motion',
        ]);
    }
}
