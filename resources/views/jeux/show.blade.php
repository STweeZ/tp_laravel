@extends('layout.master')

@section('title', 'Affichage du jeu')

@section('navbar')
    @parent
@endsection
@section('content')

<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3>Suppression d'un jeu</h3>
    @else
        <h3>Affichage d'un jeu</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>
<div>
    @if($jeu->image!=null) <img src="{{$jeu->image}}}">
    @else <img src="{{url('storage/images/'.$jeu->id)}}" alt="le logo" style="width:100px;height:100px;">
    @endif
</div>
<div>
    {{-- le nom  --}}
    <p><strong>Nom : </strong>{{$jeu->nom}}</p>
</div>
<div>
    {{-- l'age min  --}}
    <p><strong>Age_min : </strong>{{$jeu->age_min}}</p>
</div>
<div>
    {{-- le joueur min  --}}
    <p><strong>Min_max_joueur : </strong>{{$jeu->min_max_joueurs}}</p>
</div>
<div>
    {{-- la durée min  --}}
    <p><strong>Min_max_duree : </strong>{{$jeu->min_max_duree}}</p>
</div>
<div>
    {{-- la description  --}}
    <p><strong>Description :</strong>{{ $jeu->description}}</p>
</div>

@if($action != 'delete')
    <div>
        {{-- les tags  --}}
        <p><strong>Tags :</strong>
        @foreach ($tags as $tag)
            <li>{{ $tag->label }}</li>
            @endforeach
            </p>
    </div>
    <div>
        {{-- les commentaires  --}}
        <p><strong>Commentaires :</strong>
        @foreach ($commentaires as $commentaire)
                <li>Titre : {{ $commentaire->titre }}<br>{{ $commentaire->body }}<br><p style="text-align: right;"> {{ $commentaire->auteur }}</p></li>
            @endforeach
            </p>
    </div>
    <div>
        <a href="{{route('jeux.index')}}">Retour à la liste</a>
    </div>
@else
    <form action="{{route('jeux.destroy',$jeu->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>
@endif

@endsection
