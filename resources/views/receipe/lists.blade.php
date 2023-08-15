<div class="max-w-7xl mx-auto p-6 lg:p-8">
    <h1>BIENVENUE AU COMPOTIER DE LA GRAND-MERE</h1>
    <br>
    <div class="flex justify-center">
        <h2>LISTE DES RECETTES</h2>
    </div>
    <hr>
    <div >
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            <a href="{{url('/receipe/{id}')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>                           
                    {{-- @foreach ($receipes as $receipe) --}}
                        
                    <h2 class="flex justify-center mt-6 text-xl font-semibold text-gray-900 dark:text-white">Recette (nom de la recette)</h2>
                    <img src="" alt="img-receipe-1">
                    {{-- {{ $receipe->receipe_name }} --}}
                    {{-- <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Temps de cuisson : XX </p>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Ingrédients : XX</p>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Description : XX</p>--}}
                    {{-- @endforeach      --}}
                </div> 
            </a>
        </div>
    </div>
</div>