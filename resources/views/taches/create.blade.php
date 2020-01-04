@extends('layout.master')

@section('title', 'Liste des tâches')

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
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}

<form action="{{route('taches.store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'une tâche</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la date d'expiration  --}}
        <label for="expiration"><strong>Date d'expiration : </strong></label>
        <input type="date" name="expiration" id="expiration"
               value="{{ old('expiration') }}"
               placeholder="aaaa-mm-jj">
    </div>
    <div>
        {{-- la catégorie  --}}
        <label for="categorie"><strong>Catégorie</strong></label>
        <input type="text" class="form-control" id="categorie" name="categorie"
               value="{{ old('categorie') }}">
    </div>
    <div>
        <label for="accomplie"><strong>Accomplie ?</strong></label>
        @if(old('accomplie') !== NULL && (old('accomplie') == 'O' || old('accomplie') == 'on'))
            <input type="checkbox" name="accomplie"  checked id="accomplie">
        @else
            <input type="checkbox" name="accomplie" id="accomplie">
        @endif
    </div>
    <div>
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ old('description') }}</textarea>
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>

@endsection