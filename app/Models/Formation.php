<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'etablissement',
        'pays_id',
        'domaine_id',
        // 'statut',
        'annee_diplome',
        'link',
        'document'
        // 'candidature_id',
    ];
}
