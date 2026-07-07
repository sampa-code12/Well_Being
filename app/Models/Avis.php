<?php

namespace App\Models;

use App\Enums\StatusAvis;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    protected $primaryKey = 'idAvis';
    protected $fillable = [
        'contenu',
        'idUser',
        'StatusModeration'
    ];

    protected function casts():array
    {
        return [
            'StatusModeration'=>StatutAvis::class
        ];
    }

    public function user(){
        return $this->belongsTo(User::class,'idUser');
    }
}
