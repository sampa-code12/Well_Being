<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberDashboardMessagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_member_dashboard_displays_message_replies(): void
    {
        $member = User::create([
            'nom' => 'Doe',
            'prenom' => 'Jane',
            'tel' => '0123456789',
            'pays' => 'France',
            'ville' => 'Paris',
            'profession' => 'Designer',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'role' => Role::MEMBRE->value,
        ]);

        Message::create([
            'user_id' => $member->idUser,
            'contenu' => 'Bonjour, j’ai besoin d’aide.',
            'envoye_par' => Role::MEMBRE->value,
            'reponse' => 'Bonjour Jane, nous vous répondrons rapidement.',
            'repondu_par' => $member->idUser,
        ]);

        $response = $this->actingAs($member)->get(route('membre.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Bonjour, j’ai besoin d’aide.');
        $response->assertSee('Bonjour Jane, nous vous répondrons rapidement.');
    }
}
