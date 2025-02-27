<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commentary; // Changez en "GameCommentary" si c'est le nom de votre modèle

class CommentController extends Controller
{
    /**
     * Affiche la liste de tous les commentaires.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau commentaire.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Stocke un nouveau commentaire dans la base de données.
     */
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'comment'  => 'required|string',
            'user_id'  => 'required|exists:users,id',
            'game_id'  => 'required|exists:games,id',
        ]);

        Comment::create($request->all());
        return redirect()->route('comments.index')->with('success', 'Commentaire ajouté avec succès.');
    }

    /**
     * Affiche un commentaire spécifique.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    /**
     * Affiche le formulaire d'édition pour un commentaire existant.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Met à jour un commentaire existant dans la base de données.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données
        $request->validate([
            'comment'  => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return redirect()->route('comments.index')->with('success', 'Commentaire modifié avec succès.');
    }

    /**
     * Supprime un commentaire de la base de données.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Commentaire supprimé avec succès.');
    }
}
