<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Affiche la liste complète des jeux.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau jeu.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Stocke un nouveau jeu dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'developer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('games', 'public');
            $validated['image_url'] = $imagePath; // Ne pas ajouter 'storage/'
        }

        Game::create($validated);
        return redirect()->route('games.index')->with('success', 'Jeu ajouté avec succès.');
    }

    /**
     * Affiche un jeu spécifique.
     */
    public function show(string $id)
    {
        $game = Game::with('comments')->findOrFail($id);
        return view('games.show', compact('game'));
    }

    /**
     * Affiche le formulaire d'édition pour un jeu existant.Affiche le formulaire d'édition pour un jeu existant.
     */
    public function edit(string $id)
    {
        $game = Game::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    /**
     * Met à jour un jeu existant dans la base de données.Met à jour un jeu existant dans la base de données.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'developer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $game = Game::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image_url')) {
            // Supprimer l'ancienne image si elle existe
            if ($game->image_url) {
                $oldPath = str_replace('storage/', '', $game->image_url);
                \Storage::disk('public')->delete($oldPath);
            }

            // Créer un nom de fichier basé sur le nom du jeu
            $gameName = \Str::slug($request->name);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileName = $gameName . '-' . time() . '.' . $extension;
            
            // Stocker la nouvelle image
            $imagePath = $request->file('image_url')->storeAs('games', $fileName, 'public');
            $data['image_url'] = 'storage/' . $imagePath;
            
            \Log::info('Image mise à jour: ' . $imagePath);
        }

        $game->update($data);
        return redirect()->route('games.index')->with('success', 'Jeu modifié avec succès.');
    }

    /**
     * Supprime un jeu de la base de données.
     */
    public function destroy(string $id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Jeu supprimé avec succès.');
    }
}
