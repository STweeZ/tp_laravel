<html>
<head>
    @show
        <title>{{ config('app.name', 'Master') }} - @yield('title', 'Master')</title>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="{{route('accueil.index')}}">Projet Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('taches.index')}}">Taches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('jeux.index')}}">Jeux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('commentaires.index')}}">Commentaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('tags.index')}}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('accueil.apropos')}}">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('accueil.contact')}}">Contact</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Connexion</a>
            </li>
        </ul>
    </nav>
@show

<div class="container" style="margin-top:3rem;margin-bottom:3rem;">
    @yield('content', 'En Attente d\'un contenu')
</div>

@section('footer')
    <div style="bottom:0px;">
        <footer class="py-4 bg-dark text-white-50 footer">
            <div class="text-center" style="text-align: center;">
                <p>IUT de Lens - Département Info - TP Laravel</p>
                <small>Copyright &copy; IUT de Lens</small>
            </div>
        </footer>
    </div>
@show
</body>
</html>
