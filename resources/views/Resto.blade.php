<!DOCTYPE html>
<html>
<head>
    <title>Restaurants</title>
</head>
<body>
    <h1>Accueil</h1>

    @foreach($restaurants as $restaurant)
        <div>
            <p>{{ $restaurant->nom }}</p>
            <p>{{ $restaurant->adresse }}</p>
            <p>{{ $restaurant->description }}</p>
        </div>
    @endforeach
</body>
</html>