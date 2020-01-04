<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('commentaires.index', ['commentaires' => $commentaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaires.create');
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
                'jeu_id' => 'required',
                'titre' => 'required',
                'body' => 'required',
                'auteur' => 'required'
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $commentaire= new Commentaire;
        $user = Auth::user();

        $commentaire->auteur_id = $user->id;
        $commentaire->jeu_id = $request->jeu_id;
        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->auteur = $request->auteur;

        // insertion de l'enregistrement dans la base de données
        $commentaire->save();

        // redirection vers la page qui affiche la liste des commentaires
        return redirect('/commentaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $commentaire = Commentaire::find($id);
        return view('commentaires.show', ['commentaire' => $commentaire, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaires.edit', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);

        if (Gate::denies('update-commentaire', $commentaire)) {
            return redirect()->route('commentaires.show', ['commentaire' => $commentaire, 'action' => 'show'])->with('status', 'Impossible de modifier le commentaire');
        }

        $this->validate(
            $request,
            [
                'jeu_id' => 'required',
                'titre' => 'required',
                'body' => 'required',
                'auteur' => 'required',
            ]
        );

        $commentaire->jeu_id = $request->jeu_id;
        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->auteur = $request->auteur;
        $commentaire->save();

        return redirect()->route('commentaires.show', ['commentaire' => $commentaire, 'action' => 'show'])->with('status', 'Commentaire modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);

        if (Gate::denies('delete-commentaire', $commentaire)) {
            return redirect()->route('commentaires.show', ['commentaire' => $commentaire, 'action' => 'show'])->with('status', 'Impossible de supprimer le commentaire');
        }
        if ($request->delete == 'valide') {
            $commentaire->delete();
        }
        return redirect()->route('commentaires.index')->with('status', 'Commentaire supprimé avec succès');
    }
}
