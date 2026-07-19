<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserPromotionTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_promote_a_member_to_admin(): void
    {
        $admin = User::factory()->create([
            'role' => Role::ADMIN->value,
        ]);
        $member = User::factory()->create([
            'role' => Role::MEMBRE->value,
        ]);

        $response = $this->actingAs($admin)->post(route('admin.users.promote', $member));

        $response->assertRedirect(route('admin.users'));
        $response->assertSessionHas('success', 'Utilisateur promu administrateur avec succès.');

        $member->refresh();
        $this->assertSame(Role::ADMIN, $member->role);
        $this->assertSame($admin->idUser, $member->promoted_by);
    }

    public function test_promoted_admin_cannot_demote_the_admin_who_promoted_them(): void
    {
        $admin = User::factory()->create([
            'role' => Role::ADMIN->value,
        ]);
        $member = User::factory()->create([
            'role' => Role::MEMBRE->value,
        ]);

        $this->actingAs($admin)->post(route('admin.users.promote', $member));

        $promotedAdmin = $member->fresh();
        $response = $this->actingAs($promotedAdmin)->post(route('admin.users.demote', $admin));

        $response->assertForbidden();

        $admin->refresh();
        $this->assertSame(Role::ADMIN, $admin->role);
    }
}
