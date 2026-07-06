<?php

namespace App\Enums;

enum StatusAvis:string
{
    case VISIBLE = 'visible';
    case MASQUEE = 'masquée';
    case SIGNALEE = 'signalée';

    public function label():string
    {
        return match($this){
            self::VISIBLE => 'Deja visible',
            self::MASQUEE => 'Deja masquée',
            self::SIGNALEE => 'Avis deja signalee'
        };
    }
}