@foreach ($receipes as $receipe)
    <div>
        <p>Recette  {{ $receipe->receipe_name }}</p>
        <img src="" alt="img-receipe-1">            
        <p >Créé le : </p> {{ $receipe->created_at->format('d-m-Y H:m:s') }}
        <p >Par : </p> {{-- auteur --}}   
        @auth         
        <a href="/receipe/{{$receipe->user_id}}">
        Voir la recette</a>
        @endauth
    </div> 
@endforeach