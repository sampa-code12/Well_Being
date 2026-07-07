<?php

namespace App\Policies;

use App\Enums\Role;
use App\Enums\StatutAvis;
use App\Enums\StatutDemande;

class DemandeServicePolicy
{
    public function  create(User $user) : bool {
        return $user->role == Role::MEMBRE;
    }

    public function view(User $user,DemandeService $demande):bool{
        return $user->role == Role::ADMIN || $user->getKey() == $demande->idUser;
    }

    public function updateStatus(User $user,DemandeService $demande):bool{
        return $user->role == Role::ADMIN;
    }
}