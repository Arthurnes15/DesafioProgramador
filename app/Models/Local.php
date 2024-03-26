<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    //Define que um local pode ter muitos ativos:
    public function actives() {
        return $this->hasMany('App\Models\Active');
    }
}
