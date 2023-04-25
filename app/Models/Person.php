<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    use HasFactory;

    protected $fillable = [
        'id', 'nro_documento', 'department_id', 'gender_id', 'nombres', 'paterno','materno', 'fecha_nac', 'nro_celular', 'direccion', 'email'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function forms()
    {
        return $this->hasOne(Form::class);
    }

}
