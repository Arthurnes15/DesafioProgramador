<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    use HasFactory;

    //Define que todos os dados enviados pelo post podem ser atualizados sem restrições:
    protected $guarded = [];
    //Define que a class Active pertece a um local:
    public function local() {
        return $this->belongsTo('App\Models\Local');
    }
    //Define que a class Active pertece a um pessoa:
    public function person() {
        return $this->belongsTo('App\Models\Person');
    }
}
