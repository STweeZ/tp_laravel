@extends('layout.master')

@section('title', 'A propos')

@section('navbar')
    @parent
@endsection
@section('content')


<div class="container">
    <blockquote class="blockquote text-center">
        <h3>A propos de l'application web :</h3>
        <br/>
        Sur cette application web il vous est possible d'afficher une liste de jeu dans l'onglet 'Jeux'. Vous pourrez ainsi choisir d'afficher 5 jeux, 10 jeux, ou alors l'ensemble des jeux.<br/>
        Vous pouvez en rajouter ou en supprimer, ainsi que les modifier. Les jeux affichés auront aussi une image qui leur sont propre et qui est stockée sur le serveur. Vous pouvez la modifier si vous le souhaitez<br/>
        Vous pouvez faire les même choses avec une liste de tâches dans l'onglet 'Taches'.<br/>
        Vous pouvez cliquer sur un jeu pour voir plus particulièrement les spécificités de celui-ci.<br/>
        Par rapport aux jeux, vous pouvez voir les commentaires assignés à ceux-ci. Ainsi que les tags auss associés à ceux-ci.<br/>
        Vous pouvez voir tous les commentaires écrits sur le site. Ainsi que tous les tags écrits et qui se rapportent à des jeux.<br/>
        Vous pouvez rajouter des commentaires et des tags, ainsi qu'en supprimer.<br/>
        L'écriture d'un commentaire n'est possible qu'en étant connecté au site. Et la suppression ainsi que la modification d'un commentaire n'est possible que par son créateur lui-même.<br/>
        <br/>
        <h3>Les différents acteurs du site :</h3>
        <table class="table table-dark" style="margin-top:3rem;margin-bottom:4rem;">
            <thead>
            <tr>
                <th scope="col">Métier</th>
                <th>Entité</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">PDG</th>
                    <td>Grégoire DELACROIX</td>
                </tr>
                <tr>
                    <th scope="col">Chef du département</th>
                    <td>Grégoire DELACROIX</td>
                </tr>
                <tr>
                    <th scope="col">Réalisateur du site</th>
                    <td>Grégoire DELACROIX</td>
                </tr>
                <tr>
                    <th scope="col">Gérant de l'application web</th>
                    <td>Grégoire DELACROIX</td>
                </tr>
                <tr>
                    <th scope="col">Chef de projet</th>
                    <td>Grégoire DELACROIX</td>
                </tr>
            </tbody>
        </table>
    </blockquote>
</div>

@endsection
