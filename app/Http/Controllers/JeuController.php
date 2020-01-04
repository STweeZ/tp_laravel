<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeu::all();
        return view('jeux.index', ['jeux' => $jeux]);
    }

    public function index2($nb)
    {
        $jeux = Jeu::all()->take($nb);
        return view('jeux.index', ['jeux' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'age_min' => 'required',
                'min_max_joueurs' => 'required',
                'min_max_duree' => 'required',
                'description' => 'required',
                'image'
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $jeu= new Jeu;

        $jeu->nom = $request->nom;
        $jeu->age_min = $request->age_min;
        $jeu->min_max_joueurs = $request->min_max_joueurs;
        $jeu->min_max_duree = $request->min_max_duree;
        $jeu->description = $request->description;
        $jeu->image = $request->image;

        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        // redirection vers la page qui affiche la liste des jeux
        return redirect('/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $jeu = Jeu::find($id);
        $commentaires=$jeu->commentaires;
        $tags = Jeu::find($id)->tags;

        return view('jeux.show', ['jeu' => $jeu, 'action' => $action,'commentaires' => $commentaires,'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeu::find($id);
        return view('jeux.edit', ['jeu' => $jeu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jeu = Jeu::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'age_min' => 'required',
                'min_max_joueurs' => 'required',
                'min_max_duree' => 'required',
                'description' => 'required',
            ]
        );
        $jeu->nom = $request->nom;
        $jeu->age_min = $request->age_min;
        $jeu->min_max_joueurs = $request->min_max_joueurs;
        $jeu->min_max_duree = $request->min_max_duree;
        $jeu->description = $request->description;

        $jeu->save();

        return redirect()->route('jeux.show',$jeu->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $jeu = Jeu::find($id);
            $jeu->delete();
        }
        return redirect()->route('jeux.index');
    }

    public function upload(Request $request) {
        if ($request->hasFile('document')  && $request->file('document')->isValid()) {
            $file = $request->file('document');
            $msg = sprintf("Récupération d'un fichier %s (%s) de taille %d extension %s, veuillez retourner à la page d'avant.", $file->path(), $file->getClientOriginalName(), $file->getSize(), $file->extension());
            $id=DB::table('pweb.jeux')->select('id')->max('id');
            $file->storeAs('images',$id+1);
        } else {
            $msg = "Aucun fichier téléchargé, veuillez retourner à la page d'avant.";
        }
        die($msg);
    }

    public function upload2(Request $request,$id) {
        if ($request->hasFile('document')  && $request->file('document')->isValid()) {
            $file = $request->file('document');
            $msg = sprintf("Récupération d'un fichier %s (%s) de taille %d extension %s, veuillez retourner à la page d'avant.", $file->path(), $file->getClientOriginalName(), $file->getSize(), $file->extension());
            $file->storeAs('images',$id);
        } else {
            $msg = "Aucun fichier téléchargé, veuillez retourner à la page d'avant.";
        }
        die($msg);
    }
}
