<!DOCTYPE html>
<html>
    <head>
        <title>Détail de la visite</title>
    </head>
    <body>
        <h1>Visite du {{ $visite->date_visite }}</h1>

        <p>Commentaire : {{ $visite->commentaire }}</p>
        <p>Score moyen : {{ $scoremoyenne }} / 10</p>

        <h3>Notes par critère</h3>
        @foreach($évaluations as $eval)
            <div>
                <span>{{ $eval->libelle }}</span>
                <span>{{ $eval->note }} / 10</span>
            </div>
        @endforeach

        <a href="{{ route('restaurants.visites.index', $visite->restaurant_id) }}">Retour</a>
    </body>
</html>