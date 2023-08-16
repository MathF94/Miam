<a href="{{url('/')}}">Revenir aux recettes</a>
<section>
    <header>
        <h1>Recette de {{ $receipe->receipe_name }} </h1>
        <h5>Créé le : {{ $receipe->created_at->format('d-m-Y H:m:s') }} </h5> 
        <h5>Par : {{ $receipe->author->username }} </h5> {{-- auteur --}}   
    </header>

    <img src=" {{ Storage::url($receipe->image->path) }}" alt="img-receipe-1">        
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
        <form action="/update-receipe/{{ $receipe->id }}" method="">
            @csrf
        {{-- <a href="#">Modifier la recette</a> --}}
        @method('update')
            <button type="submit">Update</button>
        </form>

        <form action="/receipe/{{ $receipe->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </section>
@endauth
