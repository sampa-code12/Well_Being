<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@wellbeing.local'],
            [
                'nom' => 'Admin',
                'prenom' => 'Well-Being',
                'tel' => '0000000000',
                'pays' => 'France',
                'ville' => 'Paris',
                'profession' => 'Administrateur',
                'email' => 'admin@wellbeing.local',
                'password' => Hash::make('Admin@1234'),
                'role' => Role::ADMIN,
            ]
        );
    }
}
