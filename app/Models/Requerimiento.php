<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'sempresa_id', 'profession_id', 'cantidad'
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function sempresa()
    {
        return $this->belongsTo(Sempresa::class);
    }

    public function listas()
    {
        return $this->hasMany(Lista::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
