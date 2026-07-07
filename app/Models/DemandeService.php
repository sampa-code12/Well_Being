<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeService extends Model
{
    protected $table = 'demande_services';
    protected $primaryKey = 'idDmdeService';
    protected $fillable = [
        'user_id',
        'service_id',
        'dateCommande',
        'statut_demande'
    ];

    public function casts():array
    {
        return [
            'dateCommande'=>'date'
        ];
    }

    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id', 'idService');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'idUser');
    }
}
