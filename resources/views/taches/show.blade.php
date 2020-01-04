@extends('layout.master')

@section('title', 'Affichage de la tache')

@section('navbar')
    @parent
@endsection
@section('content')

<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3>Suppression d'une tâche</h3>
    @else
        <h3>Affichage d'une tâche</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>
<div>
    {{-- la date d'expiration  --}}
    <p><strong>Date d'expiration : </strong>{{$tache->expiration}}</p>
</div>
<div>
    {{-- la catégorie  --}}
    <p><strong>Catégorie : </strong>{{$tache->categorie}}</p>
</div>
<div>
    <p><strong>Accomplie ? </strong>
        @if($tache->accomplie == 'O')
            Oui
        @else
            Non
        @endif
    </p>
</div>
<div>
    <p><strong>Description : </strong>{{ $tache->description}}</p>
</div>
@if($action == 'delete')
    <form action="{{route('taches.destroy',$tache->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>
@else
    <div>
        <a href="{{route('taches.index')}}">Retour à la liste</a>
    </div>
@endif

@endsection
