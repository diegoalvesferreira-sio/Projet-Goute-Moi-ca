<!DOCTYPE html>
<html>
    <head>
        <title>Nouvelle visite - {{ $restaurant->nom }}</title>
    </head>
    <body>
        <h1>Nouvelle visite pour {{ $restaurant->nom }}</h1>

        <form method="POST" action="{{ route('restaurants.visites.store', $restaurant->id) }}">
            @csrf

            <input type="date" name="date_visite" placeholder="Date de visite" required>

            <textarea name="commentaire" placeholder="Commentaire"></textarea>

            <h3>Notes par critère (1 à 10)</h3>
            @foreach($criteres as $critere)
                <div>
                    <label>{{ $critere->libelle }}</label>
                    <input type="number" name="notes[{{ $critere->id }}]" min="1" max="10" required>
                </div>
            @endforeach

            <button type="submit">Enregistrer</button>
        </form>
    </body>
</html>