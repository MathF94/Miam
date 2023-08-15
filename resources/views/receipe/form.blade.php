<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvelle recette') }}
        </h2>
    </x-slot>

    <form action="{{url('/receipe')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">
            <input type="hidden" name="id" value="">
        </label>
        <label for="file">
            <input type="file" name="file" placeholder="fichier" id="file" value="{{ old('file') }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="receipe_name">
            <input type="text" name="receipe_name" placeholder="Nom de la recette" id="receipe_name" value="{{ old('receipe_name') }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="time_cook">
            <input type="time" name="time_cook" placeholder="Temps de cuisson" id="time_cook" value="{{ old('time_cook') }}" class="" /><span class="mandatory">*</span>
        </label> 
        <label for="ingredients">
            <input type="text" name="ingredients" placeholder="Ingredients" id="ingredients" value="{{ old('ingredients') }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="description">
            <input type="text" name="description" placeholder="Description" id="description" value="{{ old('description') }}" class="" /><span class="mandatory">*</span>
        </label>
        <button type="submit">Valider la recette</button>
    </form>

</x-app-layout>