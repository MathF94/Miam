@foreach ($receipes as $receipe)
    <div>
        <p> Recette  {{ $receipe->receipe_name }}</p>
        @if ($receipe->image)
            <img src="{{ Storage::url($receipe->image->path) }}" alt="">
        @else
            <p> Pas d'image disponible </p>
        @endif 
        
        <p> Créé le : {{ $receipe->created_at->format('d-m-Y H:m:s') }}</p> 
        <p> Par : {{ $receipe->author->username }}</p>    
        @auth         
            <a href="/receipe/{{$receipe->id}}">
                Voir la recette
            </a>
        @endauth
    </div> 
@endforeach
    