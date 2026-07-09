<?php

namespace App\Models;

use App\Enums\StatutAvis;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    protected $primaryKey = 'idAvis';
    protected $fillable = [
        'contenu',
        'user_id',
        'idUser',
        'status_avis',
        'StatusModeration'
    ];

    protected function casts():array
    {
        return [
            'StatusModeration'=>StatutAvis::class
        ];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'idUser');
    }
}
