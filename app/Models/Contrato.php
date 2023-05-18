<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','requerimiento_id', 'form_id', 'fecha_inicio', 'fecha_fin'
    ];

    public function requerimiento()
    {
        return $this->belongsTo(Requerimiento::class);
    }

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public function formulario()
    {
        return $this->belongsTo(Form::class, 'form_id', 'id');
    }

}
