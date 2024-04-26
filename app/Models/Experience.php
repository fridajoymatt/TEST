<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeur',
        'fonction',
        'debut',
        'fin',
        'description',
        'pays_id',
        // 'candidature_id',
        'link',
    ];
}
