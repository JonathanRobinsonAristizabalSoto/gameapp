<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Muestra una lista de todos los juegos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Cargar la relación 'category' con los juegos
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
        return view('games.create');
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
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|unique:games|max:255',
            'developer' => 'required|string|max:255',
            'releasedate' => 'required|date',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'price' => 'required|numeric',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejar la carga de la imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'no-photo.png';
        }

        // Crear el nuevo juego
        Game::create([
            'title' => $request->title,
            'developer' => $request->developer,
            'releasedate' => $request->releasedate,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'price' => $request->price,
            'genre' => $request->genre,
            'description' => $request->description,
            'image' => $imageName, // Guardar solo el nombre del archivo
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
        return view('games.edit', compact('game'));
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
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|max:255|unique:games,title,' . $game->id,
            'developer' => 'required|string|max:255',
            'releasedate' => 'required|date',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'price' => 'required|numeric',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejar la carga de la nueva imagen
        if ($request->hasFile('image')) {
            // Obtener el archivo de imagen
            $image = $request->file('image');
            // Generar un nombre único para la imagen
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Mover la imagen al directorio public/images
            $image->move(public_path('images'), $imageName);
            // Actualizar el campo de imagen en el juego
            $game->image = $imageName;
        }

        // Actualizar otros campos del juego
        $game->update($request->except('image'));

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
        // Validar la solicitud
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        // Buscar juegos basados en la consulta
        $query = $request->input('query');
        $games = Game::where('title', 'LIKE', "%$query%")
                     ->orWhereHas('category', function($q) use ($query) {
                         $q->where('manufacturer', 'LIKE', "%$query%");
                     })
                     ->get();

        // Devolver los resultados como HTML
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
        // Elimina el juego de la base de datos
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Juego eliminado exitosamente.');
    }
}
