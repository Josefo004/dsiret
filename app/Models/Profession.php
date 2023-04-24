<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    public function forms(){
        return $this->belongsToMany(Form::class, 'forms_professions','profession_id','form_id')
        ->withTimestamps();
    }
}
