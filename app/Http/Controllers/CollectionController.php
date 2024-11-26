<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class CollectionController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Obtener los juegos del usuario con la relación de categorías
        $games = Game::with('category')->where('user_id', $user->id)->get();

        // Verificar si el usuario tiene juegos
        $hasGames = $games->isNotEmpty();

        // Agrupar juegos por categorías
        $categories = $games->groupBy(function ($game) {
            return $game->category->name;
        });

        // Verificar si el usuario tiene categorías
        $hasCategories = $categories->isNotEmpty();

        // Retornar la vista con las variables necesarias
        return view('collection.index', compact('categories', 'hasGames', 'hasCategories'));
    }

    public function show($id)
    {
        // Obtener el juego por ID
        $game = Game::findOrFail($id);

        // Retornar la vista con los detalles del juego
        return view('collection.show', compact('game'));
    }

    public function destroy($id)
    {
        // Obtener el juego por ID
        $game = Game::findOrFail($id);

        // Eliminar el juego
        $game->delete();

        // Redirigir a la vista de colección con un mensaje de éxito
        return redirect()->route('collection.index')->with('success', 'Juego eliminado correctamente.');
    }

    public function delete($id)
    {
        // Obtener el juego por ID
        $game = Game::findOrFail($id);

        // Retornar la vista de confirmación de eliminación
        return view('collection.delete', compact('game'));
    }

    public function search(Request $request)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Obtener el término de búsqueda
        $query = $request->input('query');

        // Buscar juegos del usuario que coincidan con el término de búsqueda
        $games = Game::with('category')
            ->where('user_id', $user->id)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('genre', 'like', "%{$query}%");
            })
            ->get();

        // Agrupar juegos por categorías
        $categories = $games->groupBy(function ($game) {
            return $game->category->name;
        });

        // Retornar la vista parcial con los resultados de la búsqueda
        $html = view('collection.partials.collection_list', compact('categories'))->render();

        return response()->json(['html' => $html]);
    }
}