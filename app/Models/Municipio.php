<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';

    public function empresas()
    {
        return $this->hasMany(Sempresa::class);
    }

    public function persons()
    {
        return $this->hasMany(Person::class);
    }

}
