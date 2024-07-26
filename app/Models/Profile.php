<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profile extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $primaryKey = 'idProfil';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $table = 'profiles';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'image',
    ];

    public function getImageAttribute($value)
    {
        return $value ?? 'profiles/default-avatar-icon-of-social-media-user-vector.jpg';
    }
    public function histories()
    {
        return $this->hasMany(Historique::class, 'idProfil');
    }
}
