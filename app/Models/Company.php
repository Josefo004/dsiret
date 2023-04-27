<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'municipality_id', 'economic_activity_id', 'regime_id', 'person_id ', 'emp_direccion','razon_social', 'NIT', 'emp_email', 'emp_telefono', 'nro_roe'
    ];

    public function actividadEco()
    {
        return $this->belongsTo(EconomicActivity::class);
    }

}
