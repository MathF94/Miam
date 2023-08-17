<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une recette') }}
        </h2>
    </x-slot>

    <form action="{{route('receipe.update_treatment')}}" method="POST" enctype="multipart/form-data">
    {{-- <form action="{{url('/receipe')}}" method="POST"> --}}
        @csrf
        <label for="">
            <input type="hidden" name="id" value="{{ $receipes->id }}">
        </label>
        <label for="">
            <input type="hidden" name="user_id" value="{{ $receipes->user_id }}">
        </label>
        <img src="{{ Storage::url($receipes->file) }}" alt="Image de la recette">
        <label for="file">
            <input type="file" name="file" placeholder="fichier" id="file" value="{{ $receipes->file }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="receipe_name">
            <input type="text" name="receipe_name" placeholder="Nom de la recette" id="receipe_name" value="{{ $receipes->receipe_name }}" class="" /><span class="mandatory">*</span>
        </label>
        <label for="time_cook">
            <input type="time" name="time_cook" placeholder="Temps de cuisson" id="time_cook" value="{{ $receipes->time_cook }}" class="" /><span class="mandatory">*</span>
        </label> 
        <label for="ingredients">
            <textarea name="ingredients" id="ingredients" placeholder="Ingredients" cols="30" rows="10">{{ $receipes->ingredients }} </textarea>
            {{-- <input type="text" name="ingredients" placeholder="Ingredients" id="ingredients" value="{{ old('ingredients') }}" class="" /><span class="mandatory">*</span> --}}
        </label>
        <label for="description">
            <textarea name="description" id="description" placeholder="Description"  cols="30" rows="10">{{ $receipes->description }}</textarea>
            {{-- <input type="text" name="description" placeholder="Description" id="description" value="{{ old('description') }}" class="" /><span class="mandatory">*</span> --}}
        </label>
        <button type="submit">Valider la modification</button>
    </form>

    {{-- <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul> --}}
    
</x-app-layout>
    