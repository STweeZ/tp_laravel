@extends('layout.master')

@section('title', 'Création d\'un commentaire')

@section('navbar')
    @parent
@endsection
@section('content')

{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'un jeu
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}

<form action="{{route('commentaires.store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- le nom --}}
        <label for="jeu_id"><strong>Id du jeu :</strong></label>
        <input type="number" class="form-control" id="jeu_id" name="jeu_id"
               value="{{ old('jeu_id') }}">
    </div>
    <div>
        {{-- l'age min --}}
        <label for="titre"><strong>Titre :</strong></label>
        <input type="text" id="titre" name="titre"
               value="{{ old('titre') }}">
    </div>
    <div>
        {{-- le joueur min --}}
        <label for="body"><strong>Corps :</strong></label>
        <input type="text" id="body" name="body"
               value="{{ old('body') }}">
    </div>
    <div>
        {{-- la durée min --}}
        <label for="auteur"><strong>Auteur :</strong></label>
        <input type="text" class="auteur-control" id="auteur" name="auteur"
               value="{{ old('auteur') }}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>

@endsection