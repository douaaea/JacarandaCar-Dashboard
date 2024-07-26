<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey = 'idReservation';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'dateDepart',
        'dateArrive',
        'montant',
        'CIN',
        'matricule',

    ];
}
