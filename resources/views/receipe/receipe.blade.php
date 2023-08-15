<a href="{{url('/')}}">Revenir aux recettes</a>
<section>
    <header>
        <h1>Recette de {{ $receipe->receipe_name }} </h1>
        <h2>Créé le : {{ $receipe->created_at->format('d-m-Y H:m:s') }} </h2> 
        <h2>Par : {{ $receipe->author->username }} </h2> {{-- auteur --}}   
    </header>

    <img src="" alt="img-receipe-1">        
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
        <a href="#">Modifier la recette</a>

        <form action="/receipe/{{ $receipe->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </section>
@endauth
