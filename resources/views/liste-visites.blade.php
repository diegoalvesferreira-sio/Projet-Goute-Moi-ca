<!DOCTYPE html>
<html>
    <head>
        <title>Visites - {{ $restaurant->nom }}</title>
    </head>
    <body>
        <h1>Visites de {{ $restaurant->nom }}</h1>

        <a href="{{ route('restaurants.visites.create', $restaurant->id) }}">Ajouter une visite</a>

        @forelse($visites as $visite)
            <div>
                <p>Score : {{ $scores[$visite->id] }} / 10</p>
                <p>Date : {{ $visite->date_visite }}</p>
                <p>Commentaire : {{ $visite->commentaire }}</p>
                <a href="{{ route('visites.show', $visite->id) }}">Voir le détail</a>
                <a href="/restaurants">Retour aux restaurants</a>
            </div>
            <hr>
        @empty
            <p>Aucune visite pour ce restaurant.</p>
        @endforelse
    </body>
</html>