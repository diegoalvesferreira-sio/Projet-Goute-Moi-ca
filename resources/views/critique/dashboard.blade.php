<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Client</title>
</head>
<body>

    <h1>Bonjour {{ $user->nom_utilisateur }} !</h1>
    <p>Email : {{ $user->email }}</p>
    <p>Votre ID : {{ $user->id }}</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Se déconnecter</button>
        <a href="{{ route('liste.restaurants') }}">Voir les Restaurants</a>
    </form>

</body>
</html>