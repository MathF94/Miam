<a href="{{url('/')}}">Revenir aux recettes</a>
<section>
    <header>
        <h1>Recette de {{ $receipe->receipe_name }} </h1>
        <h5>Créé le : {{ $receipe->created_at->format('d-m-Y H:m:s') }} </h5> 
        <h5>Par : {{ $receipe->author->username }} </h5> {{-- auteur --}}   
    </header>
    
    @if ($receipe->image)
            <img src="{{ Storage::url($receipe->image->path) }}" alt="">
        @else
            <p> Pas d'image disponible </p>
        @endif 
    <article>
        <section>
            {{ $receipe->ingredients }}
        </section>
        <section>
            {{ $receipe->description }}
        </section>
    </article>
</section> 

@auth
    <section>
        <a href="{{ route('receipe.update', ['id' => $receipe->id]) }}">Modifier la recette</a>
        
        <form action="/receipe/{{ $receipe->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </section>
@endauth
