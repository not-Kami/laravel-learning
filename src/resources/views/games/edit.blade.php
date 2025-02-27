@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Modifier le jeu</h1>
        <a href="{{ route('games.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
            Retour à la liste
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6"> <!-- Début de la carte -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('games.update', $game->id) }}" method="POST" class="max-w-lg mx-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block mb-2">Nom du jeu</label>
                <input type="text" name="name" id="name" 
                       class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror" 
                       value="{{ old('name', $game->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="genre" class="block mb-2">Genre</label>
                <input type="text" name="genre" id="genre" 
                       class="w-full border rounded px-3 py-2 @error('genre') border-red-500 @enderror" 
                       value="{{ old('genre', $game->genre) }}" required>
                @error('genre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="release_date" class="block mb-2">Date de sortie</label>
                <input type="date" name="release_date" id="release_date" 
                       class="w-full border rounded px-3 py-2 @error('release_date') border-red-500 @enderror" 
                       value="{{ old('release_date', $game->release_date) }}" required>
                @error('release_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="developer" class="block mb-2">Développeur</label>
                <input type="text" name="developer" id="developer" 
                       class="w-full border rounded px-3 py-2 @error('developer') border-red-500 @enderror" 
                       value="{{ old('developer', $game->developer) }}" required>
                @error('developer')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="publisher" class="block mb-2">Éditeur</label>
                <input type="text" name="publisher" id="publisher" 
                       class="w-full border rounded px-3 py-2 @error('publisher') border-red-500 @enderror" 
                       value="{{ old('publisher', $game->publisher) }}" required>
                @error('publisher')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="platform" class="block mb-2">Plateforme</label>
                <input type="text" name="platform" id="platform" 
                       class="w-full border rounded px-3 py-2 @error('platform') border-red-500 @enderror" 
                       value="{{ old('platform', $game->platform) }}" required>
                @error('platform')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image_url" class="block mb-2">Image du jeu</label>
                <input type="file" name="image_url" id="image_url" 
                       class="w-full border rounded px-3 py-2 @error('image_url') border-red-500 @enderror"
                       accept="image/*">
                @error('image_url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                @if($game->image_url)
                    <div class="mt-2">
                        <img src="{{ $game->image_url }}" alt="Image actuelle" class="w-32 h-32 object-cover">
                        <p class="text-sm text-gray-600">Image actuelle</p>
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2">Description</label>
                <textarea name="description" id="description" 
                          class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror" 
                          rows="4" required>{{ old('description', $game->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 mt-6 border-t pt-4"> <!-- Modification des boutons en bas -->
                <a href="{{ route('games.show', $game->id) }}" 
                   class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                    Annuler
                </a>
                <button type="submit" 
                        class="bg-yellow-400 text-black px-6 py-2 rounded-lg hover:bg-yellow-500 transition duration-200 font-medium">
                    Mettre à jour
                </button>
            </div>
        </form>

        <div class="mt-6 border-t pt-4 text-center"> <!-- Séparateur pour les commentaires -->
            <a href="{{ route('comments.index', ['game_id' => $game->id]) }}" 
               class="inline-flex items-center text-blue-500 hover:text-blue-700 transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                Voir les commentaires
            </a>
        </div>
    </div> <!-- Fin de la carte -->
</div>
@endsectionde