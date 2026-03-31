<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des critiques</title>
</head>
<body>

    <h1>Bonjour {{ $user->nom_utilisateur }} !</h1>
    <a href="/admin/dashboard/{{ $user->id }}">← Retour au dashboard</a>

    <h2>Liste des critiques</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Statut</th>
                <th>Changer statut</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($critiques as $critique)
            <tr>
                <td>{{ $critique->id }}</td>
                <td>{{ $critique->nom_utilisateur }}</td>
                <td>{{ $critique->email }}</td>
                <td>{{ $critique->statut->libelle }}</td>
                <td>
                    <form method="POST" action="/admin/gestion-critiques/{{ $critique->id }}/statut">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            {{ $critique->statut_id == 1 ? 'Passer bénévole' : 'Passer affilié' }}
                        </button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="/admin/gestion-critiques/{{ $critique->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer ce critique ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>