<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvelle recette') }}
        </h2>
    </x-slot>

    <form action="{{route('receipe.store')}}" method="POST" enctype="multipart/form-data">
    {{-- <form action="{{url('/receipe')}}" method="POST"> --}}
        @csrf
        <label for="">
            <input type="hidden" name="id" value="">
        </label>
        <label for="file">
            <input type="file" name="file" placeholder="fichier" id="file"  class="" /><span class="mandatory">*</span>
        </label>
        <label for="receipe_name">
            <input type="text" name="receipe_name" placeholder="Nom de la recette" id="receipe_name" class="" /><span class="mandatory">*</span>
        </label>
        <label for="time_cook">
            <input type="time" name="time_cook" placeholder="Temps de cuisson" id="time_cook" class="" /><span class="mandatory">*</span>
        </label> 
        <label for="ingredients">
            <textarea name="ingredients" id="ingredients" placeholder="Ingredients" cols="30" rows="10"></textarea>
            {{-- <input type="text" name="ingredients" placeholder="Ingredients" id="ingredients" value="{{ old('ingredients') }}" class="" /><span class="mandatory">*</span> --}}
        </label>
        <label for="description">
            <textarea name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
            {{-- <input type="text" name="description" placeholder="Description" id="description" value="{{ old('description') }}" class="" /><span class="mandatory">*</span> --}}
        </label>
        <button type="submit">Valider la recette</button>
    </form>

    <a href="{{url('/receipe/{id}')}}">Annuler</a>

    {{-- <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul> --}}
    
</x-app-layout>
    