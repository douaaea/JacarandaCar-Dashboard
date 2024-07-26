<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Historique extends Model
{
    use HasFactory;
    protected $table = 'historiques';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $appends = ['time_ago'];
    protected $fillable = [
        'action',
        'idProfil',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'idProfil');
    }
    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
