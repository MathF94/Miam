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
            <td> auteur </td>
            <td><a href="/update-receipe/{{$receipe->user_id}}">Update</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
    </tbody>
</table>
@endforeach

@if (session ('status'))
    <div>
        {{session('status')}}
    </div>
@endif

<a href="{{url('/')}}">Revenir aux recettes</a>