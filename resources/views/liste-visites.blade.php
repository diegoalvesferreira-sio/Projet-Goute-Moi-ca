<!DOCTYPE html>
<html>
    <head>
        <title>Visites - {{ $restaurant->nom }}</title>
    </head>
    <body>
        <h1>Visites de {{ $restaurant->nom }}</h1>
        @auth('web')
            <a href="{{ route('restaurants.visites.create', $restaurant->id) }}">Ajouter une visite</a>
        @endauth
        <a href="/restaurants">Retour aux restaurants</a>

        @forelse($visites as $visite)
            <div>
                <p>Score : {{ $scores[$visite->id] }} / 10</p>
                <p>Date : {{ $visite->date_visite }}</p>
                <p>Commentaire : {{ $visite->commentaire }}</p>
                <p>Écrit par : {{ $visite->critique->nom_utilisateur }}</p>
                <p>Statut : {{ $visite->critique->statut->libelle }}</p>
                <a href="{{ route('visites.show', $visite->id) }}">Voir le détail</a>
                @auth('web')
                    <a href="{{ route('visites.edit', $visite->id) }}">modifier visite</a>
                @endauth
                <br></br>
                <a href="{{ route('accueil') }}">retour a l'accueil</a> 
            </div>
            <hr>
        @empty
            <p>Aucune visite pour ce restaurant.</p>
        @endforelse
    </body>
</html>