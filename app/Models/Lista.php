<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
    protected $fillable = [
        'requerimiento_id', 'usuario', 'fecha_hora', 'ids_form'
    ];

    public function requerimiento()
    {
        return $this->belongsTo(Requerimiento::class);
    }
}
