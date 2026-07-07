<?php

namespace App\Enums;

enum StatutDemande:string
{
    case EN_ATTENTE = 'en_attente';
    case RECU = 'recu';
    case EN_TRAITEMENT = 'en_traitement';
    case ACCEPTE = 'accepte';

    public function label():string
    {
        return match($this){
            self::EN_ATTENTE => 'demande en attente  de reception',
            self::RECU => 'demande bien recu',
            self::EN_TRAITEMENT => 'demande en cour de traitement',
            self::ACCEPTE => 'demande valide et accepte',
        };
    }

}