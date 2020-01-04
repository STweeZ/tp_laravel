@extends('layout.master')

@section('title', 'Affichage des jeux')

@section('navbar')
    @parent
@endsection
@section('content')

    <h2>Liste des Jeux</h2>

@if(!empty($jeux))
    <div style="text-align:center;padding-bottom:2rem;">
        <h4><a href="{{route('jeux.create')}}">Créer un jeu</a></h4>
    </div>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Affichage
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="{{route('jeux.index2',$nb=5)}}">5 jeux</a>
            <a class="dropdown-item" href="{{route('jeux.index2',$nb=10)}}">10 jeux</a>
            <a class="dropdown-item" href="{{route('jeux.index')}}">Tous les jeux</a>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Illustration</th>
                <th scope="col">Jeu</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jeux as $jeu)
            <tr>
                <th scope="row">
                    @if($jeu->image!=null) <img src="{{$jeu->image}}}">
                    @else <img src="{{url('storage/images/'.$jeu->id)}}" alt="le logo" style="width:100px;height:100px;">
                    @endif
                </th>
                <td>
                    <div>Jeu : {{$jeu['nom']}}<br>Age minimum : {{$jeu['age_min']}}<br>Maximum de joueur : {{$jeu['min_max_joueurs']}}<br>Durée maximale : {{$jeu['min_max_duree']}}<br>Description : {{$jeu['description']}}</div>
                    <div style="text-align: center;">
                        <br>
                        <a href="{{route('jeux.edit',$jeu->id)}}">Éditer le jeu</a>
                        <span> | </span>
                        <a href="{{route('jeux.show',$jeu->id)}}">Afficher le jeu</a>
                        <span> | </span>
                        <a href="{{route('jeux.show',$jeu->id)}}?action=delete">Supprimer le jeu</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h4><a href="{{route('jeux.index')}}">Retour en haut</a></h4>
@else
    <h3>aucune tâche</h3>
@endif

@endsection
