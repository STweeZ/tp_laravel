@extends('layout.master')

@section('title', 'Affichage des commentaires')

@section('navbar')
    @parent
@endsection
@section('content')

    <h2>Liste des Commentaires</h2>

@if(!empty($commentaires))
    <div style="text-align:center;">
        <h4><a href="{{route('commentaires.create')}}">Créer un commentaire</a></h4>
    </div>
    <ul>
        @foreach($commentaires as $commentaire)
            <li style="padding-top:2rem;">Id du jeu : {{$commentaire['jeu_id']}} <br> Titre : {{$commentaire['titre']}} <br> {{$commentaire['body']}} <br><p style="text-align: right;"> {{$commentaire['auteur']}} </p></li>
            <div style="text-align: center;">
                <a href="{{route('commentaires.edit',$commentaire->id)}}">Éditer le commentaire</a>
                <span> | </span>
                <a href="{{route('commentaires.show',$commentaire->id)}}?action=delete">Supprimer le commentaire</a>
            </div>
        @endforeach
    </ul>
    <h4><a href="{{route('commentaires.index')}}">Retour en haut</a></h4>
@else
    <h3>aucun commentaire</h3>
@endif

@endsection
