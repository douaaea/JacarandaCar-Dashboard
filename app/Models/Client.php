<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'idClient';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'CIN',
        'age',
        'permis',
        'telephone',
        'adresse',
        'sexe',
    ];
}
