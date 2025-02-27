@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-2xl overflow-hidden" style="min-height: 800px;">
            <div class="flex h-full">
                <!-- Partie gauche avec l'image -->
                <div class="w-2/5 relative">
                    @if($game->image_url)
                        <div class="absolute inset-0 bg-cover bg-center" 
                             style="background-image: url('{{ asset($game->image_url) }}');">
                            <!-- Ajout d'un overlay subtil -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black/10"></div>
                        </div>
                    @else
                        <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-xl">Pas d'image disponible</span>
                        </div>
                    @endif
                </div>

                <!-- Partie droite avec le contenu -->
                <div class="w-3/5 p-12 bg-gradient-to-r from-gray-900 to-gray-800">
                    <!-- En-tête et informations du jeu -->
                    <h1 class="text-5xl font-bold mb-8 text-white">{{ $game->name }}</h1>
                    
                    <div class="grid grid-cols-2 gap-12 mb-8">
                        <div class="space-y-4 text-gray-200">
                            <p class="text-lg"><span class="font-semibold text-white">Genre:</span> {{ $game->genre }}</p>
                            <p class="text-lg"><span class="font-semibold text-white">Date de sortie:</span> {{ $game->release_date }}</p>
                            <p class="text-lg"><span class="font-semibold text-white">Développeur:</span> {{ $game->developer }}</p>
                        </div>
                        <div class="space-y-4 text-gray-200">
                            <p class="text-lg"><span class="font-semibold text-white">Éditeur:</span> {{ $game->publisher }}</p>
                            <p class="text-lg">
                                <span class="font-semibold text-white">Plateforme:</span>
                                <span class="ml-2 px-3 py-1 bg-blue-500/50 text-white text-sm rounded-full">
                                    {{ $game->platform }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="bg-black/30 rounded-xl p-8 mb-8">
                        <h2 class="text-2xl font-semibold text-white mb-4">Description</h2>
                        <p class="text-lg leading-relaxed text-gray-200">{{ $game->description }}</p>
                    </div>

                    <!-- Section des commentaires -->
                    <div class="bg-black/30 rounded-xl p-8 mb-8">
                        <h2 class="text-2xl font-semibold text-white mb-6">Commentaires</h2>
                        
                        <!-- Liste des commentaires -->
                        @forelse($game->comments ?? [] as $comment)
                            <div class="bg-black/20 rounded-lg p-4 mb-4">
                                <p class="font-medium text-white">{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-400 mt-2">
                                    Par {{ $comment->user_name }} 
                                    @if($comment->created_at)
                                        le {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y à H:i') }}
                                    @endif
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-400 italic">Aucun commentaire pour le moment.</p>
                        @endforelse

                        <!-- Formulaire d'ajout de commentaire -->
                        <form action="{{ route('comments.store', ['game_id' => $game->id]) }}" method="POST" class="mt-8">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="user_name" class="block text-sm font-medium text-gray-300 mb-2">Votre nom</label>
                                    <input type="text" name="user_name" id="user_name" required
                                           class="w-full bg-black/20 border border-gray-600 rounded-lg px-4 py-2 text-white">
                                </div>
                                <div>
                                    <label for="comment" class="block text-sm font-medium text-gray-300 mb-2">Votre commentaire</label>
                                    <textarea name="comment" id="comment" rows="3" required
                                              class="w-full bg-black/20 border border-gray-600 rounded-lg px-4 py-2 text-white"></textarea>
                                </div>
                                <button type="submit" 
                                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                                    Ajouter un commentaire
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                        <a href="{{ route('games.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour à la liste
                        </a>
                        <div class="flex gap-4">
                            <a href="{{ route('games.edit', $game->id) }}" 
                               class="px-6 py-3 bg-yellow-500 text-black rounded-lg hover:bg-yellow-600 transition font-medium">
                                Modifier
                            </a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce jeu ?')"
                                        class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection