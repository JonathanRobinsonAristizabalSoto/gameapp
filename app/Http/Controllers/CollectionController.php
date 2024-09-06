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

        // Agrupar juegos por categoría
        $categories = $games->groupBy(function ($game) {
            return $game->category->name;
        });

        // Retornar la vista con las categorías agrupadas
        return view('collection.index', compact('categories'));
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
}
