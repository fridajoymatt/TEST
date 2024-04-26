<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau_etude extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'user_id',
        'statut'
    ];
}
