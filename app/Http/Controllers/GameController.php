<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Muestra una lista de todos los juegos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $games = Game::with('category')->get();
        return view('games.index', compact('games'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra el formulario para crear un nuevo juego.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('games.create', compact('categories'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Almacena un nuevo juego en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:games|max:255',
            'developer' => 'required|string|max:255',
            'releasedate' => 'required|date',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'no-photo.png'; // Valor por defecto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        Game::create([
            'title' => $request->title,
            'developer' => $request->developer,
            'releasedate' => $request->releasedate,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'price' => $request->price,
            'genre' => $request->genre,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('games.index')->with('success', 'Juego creado exitosamente.');
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra el formulario para editar un juego existente.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\View\View
     */
    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('games.edit', compact('game', 'categories'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Actualiza el juego especificado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|max:255|unique:games,title,' . $game->id,
            'developer' => 'required|string|max:255',
            'releasedate' => 'required|date',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($game->image && $game->image !== 'no-photo.png') {
                $oldImagePath = public_path('images/' . $game->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $game->image = $imageName;
        }

        $game->update($request->except('image')); // Excluir 'image' para no sobrescribir la imagen existente

        return redirect()->route('games.index')->with('success', 'Juego actualizado correctamente.');
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra los detalles de un juego específico.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\View\View
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Maneja la búsqueda de juegos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');
        $games = Game::where('title', 'LIKE', "%$query%")
                     ->orWhereHas('category', function($q) use ($query) {
                         $q->where('name', 'LIKE', "%$query%");
                     })
                     ->get();

        $html = view('games.partials.game_list', compact('games'))->render();

        return response()->json(['html' => $html]);
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra la vista de confirmación de eliminación de un juego.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\View\View
     */
    public function delete(Game $game)
    {
        return view('games.delete', compact('game'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Elimina un juego específico de la base de datos.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Game $game)
    {
        if ($game->image && $game->image !== 'no-photo.png') {
            $imagePath = public_path('images/' . $game->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $game->delete();

        return redirect()->route('games.index')->with('success', 'Juego eliminado exitosamente.');
    }
}
