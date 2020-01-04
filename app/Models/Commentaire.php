<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'pweb.commentaires';

    function jeu() {
        return $this->belongsTo(Jeu::class);
    }

    public $timestamps = false;
}
