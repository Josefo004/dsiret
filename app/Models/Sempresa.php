<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sempresa extends Model
{
    protected $table = 'sempresas';
    use HasFactory;
    protected $fillable = [
        'id', 'municipio_id', 'eactividade_id', 'regime_id', 'person_id', 'emp_direccion','razon_social', 'NIT', 'emp_email', 'emp_telefono', 'nro_roe'
    ];


    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function regime()
    {
        return $this->belongsTo(Regime::class);
    }

    public function eactividade()
    {
        return $this->belongsTo(Eactividade::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function requerimientos()
    {
        return $this->hasMany(Requerimiento::class);
    }

}
