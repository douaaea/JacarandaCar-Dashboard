<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    protected $primaryKey = 'idModel';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [

        'modelMarque',
        'marqueVoiture',
    ];

}
