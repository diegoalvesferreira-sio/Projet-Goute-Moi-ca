<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
    <title>Restaurants</title>
</head>
<body>
    <h1>Accueil</h1>
    <a href="{{ Route('restaurants.ajout.create')}}"> ajouter un restaurant</a>

    @foreach($restaurants as $restaurant)
        <div>
            <p>{{ $restaurant->nom }}</p>
            <p>{{ $restaurant->adresse }}</p>
            <p>{{ $restaurant->description }}</p>
            <p>Score moyen : {{ $scores[$restaurant->id] }} / 10</p>
            <a href="{{ route('restaurants.visites.index', $restaurant->id) }}">Voir les visites</a>
            <a href="{{ Route('restaurants.modif.edit', $restaurant->id)}}"> Mettre a jour les information du restaurant</a>
        </div>
    @endforeach
</body>
</html>