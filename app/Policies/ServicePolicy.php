<?php

namespace App\Policies;

use App\Enums\Role;
use App\Enums\StatusAvis;
use App\Enums\StatutDemande;

class ServicePolicy 
{
  // a propos de la consultation des services meme par les visiteurs sans compte ,elle n'est pas 
  // gere par cette couche

  public function create(User $user):bool{
    return $user->role ==  Role::ADMIN;
  }

  public function update(User $user,Service $service):bool{
    return $user->role == Role::ADMIN;
  }

  public function delete(User $user,Service $service):bool{
    return $user->role == Role::ADMIN;
  }
}
