<!DOCTYPE html>
<html>
<head>
    <title>Ludothèque</title>
</head>
<body>
<h2>La Ludothèque</h2>

@if(!empty($jeux))
    <ul>
        @foreach($jeux as $jeu)
            <li>{{$jeu['nom']}} {{$jeu['categorie']}} {{$jeu['description']}} {{$jeu['disponibilité']}}</li>
        @endforeach
    </ul>
@else
    <h3>Aucun jeu de disponible</h3>
@endif

</body>
</html>