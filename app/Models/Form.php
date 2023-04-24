<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'person_id', 'record_id', 'aprobado', 'cliente'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public function languages(){
        //modelo a relacionar, tabla, llave foreanea que realiza la relacion, llave foarea del model a relacionar
        return $this->belongsToMany(Language::class, 'forms_languages','form_id','language_id')
        //->withPivot('estado')
        ->withTimestamps();
    }

    public function professions(){
        //modelo a relacionar, tabla, llave foreanea que realiza la relacion, llave foarea del model a relacionar
        return $this->belongsToMany(Profession::class, 'forms_professions','form_id','profession_id')
        //->withPivot('estado')
        ->withTimestamps();
    }
}
