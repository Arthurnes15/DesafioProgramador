<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivatePerson extends Model
{
    // Especifica explicitamente o nome da tabela que deve ser usada para este modelo:
    protected $table = 'private_person';
    use HasFactory;
    // Define que a class PrivatePerson pertece a um pessoa, mais especificamente a classe Person:
    public function person() {
        return $this->belongsTo(Person::class);
    }
}
