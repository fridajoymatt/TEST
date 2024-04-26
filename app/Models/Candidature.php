<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'dateNaissance',
        'lieuNaissance',
        'niveau',
        'sexe',
        'nationnalite',
        'email',
        'indicatif1',
        'indicatif2',
        'numeroTel1',
        'numeroTel2',
        'adresse',
        'paysResidence',
        'statut_emp',
        'link',

        // 'formation_id',
        'offre_id',


        'experience',

        // 'langue_francais',
        // 'langue_anglais',



        'cv',
        'piece',
        'type_piece',
        'nationnalite_doc',
    ];
}
