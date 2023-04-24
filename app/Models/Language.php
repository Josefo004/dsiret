<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public function forms(){
        return $this->belongsToMany(Form::class, 'forms_languages','language_id','form_id')
        ->withTimestamps();
    }
}
