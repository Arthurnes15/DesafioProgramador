<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $fillable = [
        'person_name',
        'person_type'
    ];
    use HasFactory;

    // Define que uma pessoa pode ter muitos ativos:
    public function actives() {
        return $this->hasMany('App\Models\Active');
    }
    // Define que um pessoa pode ser apenas uma pessoa privada:
    public function privatePerson() {
        return $this->hasOne(PrivatePerson::class);
    }
    // Define que um pessoa pode ser apenas uma pessoa jurídica:
    public function legalPerson() {
        return $this->hasOne(LegalPerson::class);
    }

}
