<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'idService';
    protected $fillable = [
        'titre',
        'description',
        'image_url'
    ];

    public function demande_services(){
        return $this->BelongsToMany(DemandeService::class, 'idDmdeService');
    }
}
