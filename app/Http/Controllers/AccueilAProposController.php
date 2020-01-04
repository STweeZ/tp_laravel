<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilAProposController extends Controller {

    public function apropos()
    {
        return view('accueil.apropos');
    }
}