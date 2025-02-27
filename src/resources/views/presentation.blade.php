@extends('layouts.app')

@section('title', 'Présentation - GameLib')

@push('styles')
    <!-- Styles de Reveal.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.3.1/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.3.1/theme/black.min.css">
    <!-- Styles pour la coloration syntaxique avec Prism.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
    <style>
        .reveal {
            height: 100vh;
            font-size: 0.9rem; /* Taille de police globale ajustée */
        }
        .reveal pre {
            padding: 1em;
            overflow-x: auto;
        }
    </style>
@endpush

@section('content')
    <div class="reveal">
        <div class="slides">
            <!-- Slide 1 : Titre -->
            <section>
                <h2 style="font-size: 1.8rem;">Routes et Controllers en Laravel</h2>
                <p>Introduction pratique aux concepts clés du framework</p>
            </section>

            <!-- Slide 2 : Pourquoi séparer routes et controllers ? -->
            <section>
                <h2 style="font-size: 1.6rem;">Pourquoi séparer Routes et Controllers ?</h2>
                <ul>
                    <li>Séparation des responsabilités : les routes définissent l'URL, tandis que les controllers gèrent la logique.</li>
                    <li>Code mieux organisé et plus facile à maintenir.</li>
                    <li>Évolutivité et réutilisation du code.</li>
                </ul>
            </section>

            <!-- Slide 3 : Les Routes en Laravel -->
            <section>
                <h2 style="font-size: 1.6rem;">Les Routes</h2>
                <ul>
                    <li>Définissent les chemins d'accès (URLs) à votre application.</li>
                    <li>Sont déclarées dans <code>routes/web.php</code> pour les pages web et <code>routes/api.php</code> pour les API.</li>
                    <li>Peuvent pointer vers une closure ou une méthode de controller.</li>
                </ul>
                <p>Exemple pragmatique :</p>
                <pre><code class="language-php">
// routes/web.php
use App\Http\Controllers\ProductController;

// Affiche la liste des produits
Route::get('/products', [ProductController::class, 'index']);

// Affiche le détail d'un produit via son ID
Route::get('/products/{id}', [ProductController::class, 'show']);
                </code></pre>
            </section>

            <!-- Slide 4 : Les Controllers en Laravel -->
            <section>
                <h2 style="font-size: 1.6rem;">Les Controllers</h2>
                <ul>
                    <li>Contiennent la logique de traitement des requêtes HTTP.</li>
                    <li>Se trouvent dans le dossier <code>app/Http/Controllers</code>.</li>
                    <li>Interagissent avec les modèles pour récupérer ou modifier les données et renvoient des vues ou des réponses JSON.</li>
                </ul>
                <p>Exemple concret :</p>
                <pre><code class="language-php">
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Méthode pour afficher la liste des produits
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Méthode pour afficher le détail d'un produit
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
                </code></pre>
            </section>

            <!-- Slide 5 : Mise en pratique -->
            <section>
                <h2 style="font-size: 1.6rem;">Mise en pratique</h2>
                <ul>
                    <li>Utilisez <code>php artisan make:controller</code> pour générer un controller.</li>
                    <li>Définissez vos routes dans <code>routes/web.php</code> en ciblant les méthodes appropriées du controller.</li>
                </ul>
            </section>

            <!-- Slide 6 : Bonnes pratiques -->
            <section>
                <h2 style="font-size: 1.6rem;">Bonnes pratiques</h2>
                <ul>
                    <li>Utilisez le Route Model Binding pour simplifier la récupération des modèles.</li>
                    <li>Séparez vos controllers par domaine (ex : ProductController, UserController).</li>
                </ul>
            </section>

            <!-- Slide 7 : En résumé -->
            <section>
                <h2 style="font-size: 1.6rem;">En résumé</h2>
                <ul>
                    <li><strong>Routes</strong> : Mappent les URLs aux actions dans les controllers.</li>
                    <li><strong>Controllers</strong> : Gèrent la logique métier et interagissent avec les modèles et vues.</li>
                </ul>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Scripts de Reveal.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.3.1/reveal.min.js"></script>
    <!-- Script de Prism.js pour la coloration syntaxique -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script>
        Reveal.initialize({
            hash: true,
            center: true,
            height: '100%',
            width: '100%',
            slideNumber: true
        });
    </script>
@endpush