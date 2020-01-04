@extends('layout.master')

@section('title', 'Affichage de la tache')

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
     formulaire de saisie d'une tâche
     la fonction 'route' utilise un nom de route.
     '@csrf' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
     '@method('PUT') précise à Laravel que la requête doit être traitée
      avec une commande PUT du protocole HTTP.
  --}}

<form action="{{route('taches.update',$tache->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification d'une tâche</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la date d'expiration  --}}
        <label for="expiration"><strong>Date d'expiration : </strong></label>
        <input type="date" name="expiration" id="expiration"
               value="{{ $tache->expiration }}"
               placeholder="aaaa-mm-jj">
    </div>
    <div>
        {{-- la catégorie  --}}
        <label for="categorie"><strong>Catégorie</strong></label>
        <input type="text" class="form-control" id="categorie" name="categorie"
               value="{{ $tache->categorie}}">
    </div>
    <div>
        <label for="accomplie"><strong>Accomplie ?</strong></label>
        @if($tache->accomplie !== NULL && ($tache->accomplie == 'O' || $tache->accomplie == 'on'))
            <input type="checkbox" name="accomplie"  checked id="accomplie">
        @else
            <input type="checkbox" name="accomplie" id="accomplie">
        @endif
    </div>
    <div>
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ $tache->description }}</textarea>
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>

@endsection