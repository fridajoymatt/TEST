<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'reference',
        'experience',
        'details',
        'pdfFile',
        'date_limite',
        'heure_limite',
        'statut',
        'user_id',
        'age_id',
        'niveau_etudes_id',
        'domaine_id',
        'resume',


    ];
}
