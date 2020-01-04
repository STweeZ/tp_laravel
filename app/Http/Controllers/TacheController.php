<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches = Tache::all();
        return view('taches.index', ['taches' => $taches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taches.create');
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
                'expiration' => 'required',
                'categorie' => 'required',
                'description' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $tache = new Tache;

        $tache->expiration = $request->expiration;
        $tache->categorie = $request->categorie;
        $tache->description = $request->description;
        if (isset($request->accomplie) && $request->accomplie == "on")
            $tache->accomplie = "O";
        else
            $tache->accomplie = 'N';

        // insertion de l'enregistrement dans la base de données
        $tache->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/taches');
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
        $tache = Tache::find($id);

        return view('taches.show', ['tache' => $tache, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tache = Tache::find($id);
        return view('taches.edit', ['tache' => $tache]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tache = Tache::find($id);

        $this->validate(
            $request,
            [
                'expiration' => 'required',
                'categorie' => 'required',
                'description' => 'required',
            ]
        );
        $tache->expiration = $request->expiration;
        $tache->categorie = $request->categorie;
        $tache->description = $request->description;
        if (isset($request->accomplie) && $request->accomplie == "on")
            $tache->accomplie = "O";
        else
            $tache->accomplie = 'N';
        $tache->save();

        return redirect('/taches');
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
            $tache = Tache::find($id);
            $tache->delete();
        }
        return redirect()->route('taches.index');
    }
}
