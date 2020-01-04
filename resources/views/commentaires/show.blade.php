@extends('layout.master')

@section('title', 'Affichage du commentaire')

@section('navbar')
    @parent
@endsection
@section('content')

<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3>Suppression d'un commentaire</h3>
    @else
        <h3>Affichage d'un commentaire</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>
<div>
    {{-- l'id du jeu --}}
    <p><strong>Id du jeu : </strong>{{$commentaire->jeu_id}}</p>
</div>
<div>
    {{-- le titre --}}
    <p><strong>Titre : </strong>{{$commentaire->titre}}</p>
</div>
<div>
    {{-- le corps du commentaire --}}
    <p><strong>Description : </strong>{{$commentaire->body}}</p>
</div>
<div>
    {{-- l'auteur --}}
    <p><strong>Auteur : </strong>{{$commentaire->auteur}}</p>
</div>

@if($action != 'delete')
    <div>
        <a href="{{route('commentaires.index')}}">Retour à la liste</a>
    </div>
@else
    <form action="{{route('commentaires.destroy',$commentaire->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>
@endif

@endsection
