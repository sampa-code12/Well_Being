<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'user_id',
        'contenu',
        'envoye_par',
        'reponse',
        'repondu_par',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idUser');
    }
}
