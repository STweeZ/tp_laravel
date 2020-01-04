@extends('layout.master')

@section('title', 'Liste des tâches')

@section('navbar')
    @parent
@endsection
@section('content')

<h2>Liste des tâches</h2>

@if(!empty($taches))
    <div style="text-align:center;">
        <h4><a href="{{route('taches.create')}}">Créer une tache</a></h4>
    </div>
    <ul>
        @foreach($taches as $tache)
            <li style="padding-top:2rem;">Date d'expiration : {{$tache['expiration']}}<br>Catégorie : {{$tache['categorie']}}<br>Description : {{$tache['description']}}<br>Accomplie ? {{$tache['accomplie']}}</li>
            <div style="text-align: center;">
                <a href="{{route('taches.edit',$tache->id)}}">Éditer la tâche</a>
                <span> | </span>
                <a href="{{route('taches.show',$tache->id)}}">Afficher la tâche</a>
                <span> | </span>
                <a href="{{route('taches.show',$tache->id)}}?action=delete">Supprimer la tâche</a>
            </div>
        @endforeach
    </ul>
    <h4><a href="{{route('taches.index')}}">Retour en haut</a></h4>
@else
    <h3>Aucune tâche</h3>
@endif

@endsection
