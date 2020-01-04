<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = 'pweb.jeux';

    function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class,'pweb.tags_jeux');
    }

    public $timestamps = false;
}