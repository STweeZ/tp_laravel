<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'pweb.tags';

    function jeu() {
        return $this->belongsTo(Jeu::class);
    }

    public $timestamps = false;
}
