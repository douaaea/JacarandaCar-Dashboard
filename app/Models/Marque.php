<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $primaryKey = 'idMarque';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'marqueVoiture',
    ];
}
