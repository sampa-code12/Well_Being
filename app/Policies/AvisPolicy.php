<?php

namespace App\Policies;

use App\Enums\Role;
use App\Enums\StatutAvis;
use App\Enums\StatutDemande;

class AvisPolicy
{
    // Tout utilisateur connecte (membre) peut creer un avis

    public function create(User $user):bool{
        return $user->role ==  Role::MEMBRE;
    }

    // seul l'auteur peut modifier son avis , suivant les 15 minutes apres sa creation
    public function update(User $user,Avis $avis):bool{
        if($user->getKey() != $avis->idUser){
            return false;
        }

        return $avis->created_at->diffInMunites(now())<=15;
    }

    //Moderation des avis , reserve a l'administrateur de la plateforme 
    public function moderate(User $user,Avis $avis){
        return $user->role == Role::ADMIN;
    }
}