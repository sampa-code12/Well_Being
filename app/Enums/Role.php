<?php

namespace App\Enums;

enum Role:string
{
 case MEMBRE = 'membre';
 case ADMIN  = 'admin';

 public function label():string{
    return match($this){
        self::MEMBRE => 'Membre',
        self::ADMIN  => 'Administrateur'
    };
 }
}