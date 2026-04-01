<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

    <h1>Inscription</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Nom d'utilisateur</label>
        <input type="text" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">

        <label>Mot de passe</label>
        <input type="password" name="mdp">

        <button type="submit">S'inscrire</button>
    </form>

    <a href="/login">Déjà un compte ? Se connecter</a>
    <br></br>
    <a href="{{ route('accueil') }}">retour a l'accueil</a> 

</body>
</html>