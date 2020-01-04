<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $table = 'pweb.taches';

    function suivis()
    {
        return $this->hasMany(SuiviExecution::class);
    }

    function commentaires() {
        return $this->belongsToMany(Commentaire::class);
    }

    public $timestamps = false;
}
