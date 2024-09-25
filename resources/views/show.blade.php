<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepies</title>
</head>
<body>
<h1>{{ $recipe->description }}</h1>

<h2>Anleitung:</h2>
<p>{{ $recipe->instruction }}</p>

<h3>Zutaten:</h3>
<ul>
    @foreach ($recipe->incidences as $incidence)
        <li>
            {{ $incidence->quantity }} {{ $incidence->unit->abbr }} {{ $incidence->product->name }}
        </li>
    @endforeach
</ul>

</body>
</html>