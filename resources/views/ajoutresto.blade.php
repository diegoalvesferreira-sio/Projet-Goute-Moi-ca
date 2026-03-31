<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire d'ajout d'un restaurant</title>
    </head>
    <body>
        <form method="post" action="/restaurants">
            @csrf
            <input type="text" name="nom" placeholder="nom">
            <input type="text" name="adresse" placeholder="adresse">
            <input type="text" name="description" placeholder="description">
            <button type="submit">enregistrer</button>
        </form>
    </body>
</html>