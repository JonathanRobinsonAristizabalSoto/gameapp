<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Muestra una lista de todas las categorías.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra el formulario para crear una nueva categoría.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    // ------------------------------------------------------------------------------------

    /**
     * Almacena una nueva categoría en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'releasedate' => 'required|date',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Manejar la carga de la imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'no-photo.png';
        }

        // Crear la nueva categoría
        Category::create([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'releasedate' => $request->releasedate,
            'description' => $request->description ?? '',
            'image' => $imageName,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra el formulario para editar una categoría existente.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Actualiza la categoría especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'releasedate' => 'required|date',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Actualizar otros campos de la categoría
        $category->name = $request->input('name');
        $category->manufacturer = $request->input('manufacturer');
        $category->releasedate = $request->input('releasedate');
        $category->description = $request->input('description');

        // Manejar la carga de la nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen antigua si existe
            if ($category->image && file_exists(public_path('images/' . $category->image))) {
                unlink(public_path('images/' . $category->image));
            }

            // Subir la nueva imagen
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente.');
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra los detalles de una categoría específica.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Maneja la búsqueda de categorías.
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

        // Buscar categorías basadas en la consulta
        $query = $request->input('query');
        $categories = Category::where('name', 'LIKE', "%$query%")->get();

        // Devolver los resultados como HTML
        $html = view('categories.partials.category_list', compact('categories'))->render();

        return response()->json(['html' => $html]);
    }

    // ------------------------------------------------------------------------------------

    /**
     * Muestra la vista de confirmación de eliminación de una categoría.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function delete(Category $category)
    {
        return view('categories.delete', compact('category'));
    }

    // ------------------------------------------------------------------------------------

    /**
     * Elimina una categoría específica de la base de datos.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Verificar si hay juegos relacionados
        if ($category->games()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'No se puede eliminar la categoría porque está asociada con uno o más juegos.');
        }

        // Eliminar la imagen de la categoría si existe
        if ($category->image && file_exists(public_path('images/' . $category->image))) {
            unlink(public_path('images/' . $category->image));
        }

        // Elimina la categoría de la base de datos
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada exitosamente.');
    }
}
