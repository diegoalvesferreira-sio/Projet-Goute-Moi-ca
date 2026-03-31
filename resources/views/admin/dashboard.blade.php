<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>

    <h1>Bonjour {{ $user->nom_utilisateur }} !</h1>
    <p>Email : {{ $user->email }}</p>
    <p>Votre ID : {{ $user->id }}</p>
    <a href="/admin/gestion-critiques">Gérer les critiques</a>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>

</body>
</html>