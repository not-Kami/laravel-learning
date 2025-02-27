@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un nouveau jeu</h1>

    <form action="{{ route('games.store') }}" method="POST" class="max-w-lg" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-2">Nom du jeu</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="genre" class="block mb-2">Genre</label>
            <input type="text" name="genre" id="genre" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="release_date" class="block mb-2">Date de sortie</label>
            <input type="date" name="release_date" id="release_date" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="developer" class="block mb-2">Développeur</label>
            <input type="text" name="developer" id="developer" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="publisher" class="block mb-2">Éditeur</label>
            <input type="text" name="publisher" id="publisher" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="platform" class="block mb-2">Plateforme</label>
            <input type="text" name="platform" id="platform" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="image_url" class="block mb-2">Image du jeu</label>
            <input type="file" 
                   name="image_url" 
                   id="image_url" 
                   class="w-full border rounded px-3 py-2"
                   accept="image/*">
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Description</label>
            <textarea name="description" id="description" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Ajouter le jeu
        </button>
    </form>
</div>
@endsection