@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Liste des Jeux</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($games as $game)
            <div class="relative rounded-lg shadow-xl overflow-hidden group hover:scale-105 transition-transform duration-300" style="height: 400px;">
                <!-- Lien englobant toute la carte sauf le bouton modifier -->
                <a href="{{ route('games.show', $game->id) }}" class="block h-full">
                    <!-- Image de fond -->
                    @if($game->image_url)
                        <div class="absolute inset-0 bg-cover bg-center" 
                             style="background-image: url('{{ url($game->image_url) }}');">
                            <!-- Couche de flou -->
                            <div class="absolute inset-0 backdrop-blur-sm bg-black/30"></div>
                        </div>
                    @else
                        <div class="absolute inset-0 bg-gray-200"></div>
                    @endif

                    <!-- Contenu -->
                    <div class="relative h-full flex flex-col justify-between p-6 text-white">
                        <!-- En-tête -->
                        <div>
                            <h2 class="text-2xl font-bold mb-2 drop-shadow-lg">{{ $game->name }}</h2>
                            <div class="flex items-center gap-2 mb-2">
                                <p class="text-gray-200 drop-shadow">{{ $game->genre }}</p>
                                <span class="px-2 py-1 bg-blue-500/50 text-white text-sm rounded-full backdrop-blur-sm">
                                    {{ $game->platform }}
                                </span>
                            </div>
                        </div>

                        <!-- Indicateur de clic -->
                        <div class="text-sm text-gray-300 italic mt-auto mb-2">
                            Cliquez pour plus de détails
                        </div>
                    </div>
                </a>
                
                <!-- Ajouter ceci temporairement pour déboguer -->
                <div class="text-white">
                    Debug: {{ $game->image_url }}
                </div>
                
                <!-- Bouton Modifier (en dehors du lien principal) -->
                <div class="absolute bottom-4 right-4">
                    <a href="{{ route('games.edit', $game->id) }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Modifier
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Aucun jeu n'a été ajouté pour le moment.</p>
        @endforelse
    </div>
</div>
@endsection