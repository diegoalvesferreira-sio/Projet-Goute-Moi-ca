<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
    <title>Restaurants</title>
</head>
<body>
    <h1>Accueil</h1>
    <a href="{{ route('ajout.restaurants') }}">Ajouter un restaurant</a>
    @foreach($restaurants as $restaurant)
        <div>
            <p>{{ $restaurant->nom }}</p>
            <p>{{ $restaurant->adresse }}</p>
            <p>{{ $restaurant->description }}</p>
            <p>Score moyen : {{ $scores[$restaurant->id] }} / 10</p>
            <a href="{{ route('restaurants.visites.index', $restaurant->id) }}">Voir les visites</a>
            <a href="{{ route('modif.restaurants', $restaurant->id) }}">Modifier les informations du restaurant</a>
        </div>
    @endforeach
</body>
</html>