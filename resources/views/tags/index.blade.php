@extends('layout.master')

@section('title', 'Affichage des tags')

@section('navbar')
    @parent
@endsection
@section('content')

<h2 style="padding-bottom:3rem;">Liste des Tags</h2>

@if(!empty($tags))
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Label</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{$tag['id']}}</th>
                    <td>{{$tag['label']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4><a href="{{route('tags.index')}}">Retour en haut</a></h4>
@else
    <h3>aucun tag</h3>
@endif

@endsection
