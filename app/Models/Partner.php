<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'nom_entreprise',
        'nom_contact',
        'email',
        'telephone',
        'pays',
        'ville',
        'type_partenariat',
        'message',
    ];
}
