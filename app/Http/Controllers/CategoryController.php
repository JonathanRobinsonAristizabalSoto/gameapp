<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

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
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        // Manejar la carga de la imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'no-photo.png';
        }

        // Crear la nueva categoría
        $category = Category::create([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'releasedate' => $request->releasedate,
            'image' => $imageName, // Guardar solo el nombre del archivo
            'description' => $request->description ?? '',
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
            'description' => 'nullable|string',
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
            // Actualizar el campo de imagen en la categoría
            $category->image = $imageName;
        }

        // Actualizar otros campos de la categoría
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        // Redirigir a la vista de edición con un mensaje de éxito
        return redirect()->route('categories.index', $category->id)
            ->with('success', 'Categoría actualizada correctamente.');
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
            return redirect()->route('categories.index')->with('error', 'No se puede eliminar la categoría porque está asociada con uno o más juegos.');
        }

        // Elimina la categoría de la base de datos
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
