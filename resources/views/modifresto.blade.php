<!DOCTYPE html>
<html>
<head>
    <title>Modifier restaurant</title>
</head>
<body>
    <h1>Modifier {{ $restaurant->nom }}</h1>

    <form method="POST" action="/restaurants/{{ $restaurant->id }}">
        @csrf
        @method('PUT')
        <input type="text" name="nom" value="{{ $restaurant->nom }}">
        <input type="text" name="adresse" value="{{ $restaurant->adresse }}">
        <input type="text" name="description" value="{{ $restaurant->description }}">
        <button type="submit">Modifier</button>
    </form>
     <form method="POST" action="/restaurants/{{ $restaurant->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>