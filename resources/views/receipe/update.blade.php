<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une recette') }}
        </h2>
    </x-slot>

    <form action="{{route('receipe.update-traitement')}}" method="POST" enctype="multipart/form-data">
    {{-- <form action="{{url('/receipe')}}" method="POST"> --}}
        @csrf
        <label for="">
            <input type="hidden" name="id" value="" value="{{ $receipes->id }}">
        </label>
        <label for="file">
            <input type="file" name="file" placeholder="fichier" id="file" value="{{ $receipes->file }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="receipe_name">
            <input type="text" name="receipe_name" placeholder="Nom de la recette" id="receipe_name" value="{{ $receipes->name }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="time_cook">
            <input type="time" name="time_cook" placeholder="Temps de cuisson" id="time_cook" value="{{ $receipse->time_cook }}" class="" /><span class="mandatory">*</span>
        </label> 
        <label for="ingredients">
            <textarea name="ingredients" id="ingredients" placeholder="Ingredients" value="{{ $receipes->ingredients }}" cols="30" rows="10"></textarea>
            {{-- <input type="text" name="ingredients" placeholder="Ingredients" id="ingredients" value="{{ old('ingredients') }}" class="" /><span class="mandatory">*</span> --}}
        </label>
        <label for="description">
            <textarea name="description" id="description" placeholder="Description" value="{{ $receipes->description  }}" cols="30" rows="10"></textarea>
            {{-- <input type="text" name="description" placeholder="Description" id="description" value="{{ old('description') }}" class="" /><span class="mandatory">*</span> --}}
        </label>
        <button type="submit">Valider la modification</button>
    </form>

    <a href="{{url('/receipe/{user_id}')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        Voir la recette</a>
        
    {{-- <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul> --}}
    
</x-app-layout>
    