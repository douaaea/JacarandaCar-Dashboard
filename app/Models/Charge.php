<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCharge';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'typeCharge',
        'montant',
        'matricule',
    ];
}
