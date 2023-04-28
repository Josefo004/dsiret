<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eactividade extends Model
{
    use HasFactory;
    protected $table = 'eactividades';

    public function empresas()
    {
        return $this->hasMany(Sempresa::class);
    }
}
