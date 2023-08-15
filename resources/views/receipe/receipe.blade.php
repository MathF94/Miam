@foreach ($receipes as $receipe)
<table>
    <thead>
        <tr>
            <th>Nom de la recette</th>
            <th>Temps de cuisson</th>
            <th>Ingrédients</th>
            <th>Description</th>
            <th>Mise en ligne le</th>
            <th>Par</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $receipe->receipe_name }}</td>
            <td>{{ $receipe->time_cook }}</td>
            <td>{{ $receipe->ingredients }}</td>
            <td>{{ $receipe->description }}</td>
            <td>{{ $receipe->created_at->format('d-m-Y H:m:s') }}</td>
            <td>auteur</td>
            <td><a href="#">Update</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
    </tbody>
</table>
@endforeach
{{-- <ul>
    <li>Nom de la recette : {{ $receipe->receipe_name }}</li>
    <li>Temps de cuisson : {{ $receipe->time_cook }}</li>
    <li>Ingrédients : {{ $receipe->ingredients }}</li>
    <li>Description : {{ $receipe->description }}</li>
    <li>Mise en ligne le : {{ $receipe->created_at->format('d-m-Y H:m:s') }}</li>
    <li><a href="#">Update</a></li>
    <li><a href="#">Delete</a></li>
</ul> --}}

<a href="{{url('/')}}">Revenir aux recettes</a>