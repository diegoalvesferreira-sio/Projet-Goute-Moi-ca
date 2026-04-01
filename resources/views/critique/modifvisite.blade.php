<!DOCTYPE html>
<html>
<head>
    <title>Modifier visite</title>
</head>
<body>
    <h1>Visite du {{ $visite->date_visite }}</h1>
    <form method="POST" action="/visites/{{ $visite->id }}">
        @csrf
        @method('PUT')
        <input type="text" name="commentaire" value="{{ $visite->commentaire }}">
        
        <button type="submit">Modifier</button>
    </form>
    <form method="POST" action="{{ route('visites.destroy', $visite->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>