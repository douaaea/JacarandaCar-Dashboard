<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $primaryKey = 'idVoiture';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'modelMarque',
        'numPassagers',
        'prixJour',
        'matricule',
        'couleur',
        'carburant',
        'boiteVitesse',
        'type',
        'marqueVoiture',
        'image',
    ];
}
