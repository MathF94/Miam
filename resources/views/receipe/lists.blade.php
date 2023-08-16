@foreach ($receipes as $receipe)
    <div>
        <p> Recette  {{ $receipe->receipe_name }}</p>
        <img src="{{ Storage::url($receipe->image->path) }}" alt=""> 
        
        <p> Créé le : {{ $receipe->created_at->format('d-m-Y H:m:s') }}</p> 
        <p> Par : {{ $receipe->author->username }}</p> {{-- auteur --}}   
        @auth         
            <a href="/receipe/{{$receipe->id}}">
                Voir la recette
            </a>
        @endauth
    </div> 
@endforeach
    