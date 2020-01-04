<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilContactController extends Controller {

    public function contact()
    {
        return view('accueil.contact');
    }
}