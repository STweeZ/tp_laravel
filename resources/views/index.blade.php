<!DOCTYPE html>
<html>
<head>
    <title>Liste des tâches</title>
</head>
<body>
<h2>La liste des tâches</h2>

@if(!empty($taches))
    <ul>
        @foreach($taches as $tache)
            <li>{{$tache->expiration}} {{$tache->categorie}} {{$tache->description}} accomplie : {{$tache->accomplie}}</li>
        @endforeach
    </ul>
@else
    <h3>Aucune tâche</h3>
@endif

</body>
</html>