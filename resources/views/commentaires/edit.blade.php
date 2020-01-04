@extends('layout.master')

@section('title', 'Edition d\'un commentaire')

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
     la fonction 'route' utilise un nom de route.
     '@csrf' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
     '@method('PUT') précise à Laravel que la requête doit être traitée
      avec une commande PUT du protocole HTTP.
  --}}

<form action="{{route('commentaires.update',$commentaire->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification d'un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- l'id du jeu --}}
        <label for="jeu_id"><strong>Id du jeu :</strong></label>
        <input type="number" id="jeu_id" name="jeu_id"
               value="{{ $commentaire->jeu_id }}">
    </div>
    <div>
        {{-- le titre --}}
        <label for="titre"><strong>Titre :</strong></label>
        <input type="text" id="titre" name="titre"
               value="{{ $commentaire->titre }}">
    </div>
    <div>
        {{-- le corps du commentaire --}}
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea type="text" id="body" rows="6" name="body" class="form-control"
               placeholder="Description..">{{ $commentaire->body }}</textarea>
    </div>
    <div>
        {{-- l'auteur --}}
        <label for="auteur"><strong>Auteur :</strong></label>
        <input type="text" id="auteur" name="auteur"
               value="{{ $commentaire->auteur }}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>

@endsection
