<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra todas las categorías
     */
    public function getIndex()
    {
        // Obtener solo los posts donde 'habilitated' es 1 (visibles)
        $data['posts'] = Post::where('habilitated', 1)->get();
        return view('category.index', $data);
    }

    /**
     * Almacena los datos del blog en bd
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
        ]);

        // Almacenar img del blog
        $img = $request->file('poster');
        $img_name = time() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('uploads/blogs'), $img_name);

        Post::create([
            'title' => $request->title,
            'poster' => $img_name,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('/')
                         ->with('success', 'El blog se ha creado con éxito');
    }

    /**
     * Obtiene el ID de la categoría por parámetro y se visualiza individualmente
     */
    public function getShow($id) {
        $data['post'] = Post::findOrFail($id);
        return view('category.show', $data);
    }

    /**
     * Vista para crear una nueva categoría
     */
    public function getCreate() {
        return view('category.create');
    }

    /**
     * Vista para editar una categoría
     */
    public function getEdit($id) {
        $data['post'] = Post::findOrFail($id);
        return view('category.edit', $data);
    }
    /**
     * Vista para actualizar la categoria
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Encuentra el post por su ID
        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'content']));

        return redirect()->route('category.edit', ['id' => $post->id])
            ->with('success', 'Post actualizado .');
    }

}
