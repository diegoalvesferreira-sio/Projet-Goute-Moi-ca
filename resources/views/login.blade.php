<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

    <h1>Connexion</h1>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">

        <label>Mot de passe</label>
        <input type="password" name="mdp">

        <button type="submit">Se connecter</button>
        
        <a href="/register">Pas encore de compte ? S'inscrire</a>
        <br></br>
        <a href="{{ route('accueil') }}">retour a l'accueil</a> 
    </form>

</body>
</html>