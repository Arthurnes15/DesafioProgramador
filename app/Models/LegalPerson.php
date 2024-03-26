<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalPerson extends Model
{   
    // Especifica explicitamente o nome da tabela que deve ser usada para este modelo
    protected $table = 'legal_person';

    use HasFactory;

    // Define que a class LegalPerson pertece a um pessoa, mais especificamente a classe Person:
    public function person() {
        return $this->belongsTo(Person::class);
    }
}
