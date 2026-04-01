<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
    <title>Restaurants</title>
</head>
<body>
    <h1>Accueil</h1>
    @auth ('admin')
        <a href="{{ route('ajout.restaurants') }}">Ajouter un restaurant</a>
    @endauth
    @foreach($restaurants as $restaurant)
        <div>
            <p>{{ $restaurant->nom }}</p>
            <p>{{ $restaurant->localisation }}</p>
            <p>{{ $restaurant->description }}</p>
            <p>Score moyen : {{ $scores[$restaurant->id] }} / 10</p>
            <a href="{{ route('restaurants.visites.index', $restaurant->id) }}">Voir les visites</a>
            @auth ('admin')
                <a href="{{ route('modif.restaurants', $restaurant->id) }}">Modifier les informations du restaurant</a>
            @endauth
            <br></br>
        </div>
         <a href="{{ route('accueil') }}">retour a l'accueil</a> 
    @endforeach
</body>
</html>