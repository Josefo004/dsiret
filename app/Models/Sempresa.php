<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sempresa extends Model
{
    use HasFactory;
    protected $table = 'sempresas';

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}
