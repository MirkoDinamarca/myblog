<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    /* {
        $data['posts'] = Post::all();
        return view('category.index', $data);
    } */

    //CONSULTAR ESTO!!!!
    /* 

     public function create()
    {
        return view('posts.create');
    }
    */
    
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'poster' => 'required',
            'habilitated' => 'required|boolean',
            'content' => 'required',
        ]);

        $post = new Post($request->all());
        $post->usuario_id = Auth::id();
        $post->save();

        return redirect()->route('posts.index')
                         ->with('success', 'Post creado con exito!!');
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

    public function getUserPosts()
    {
        $userId = Auth::id();
        $data['posts'] = Post::where('usuario_id', $userId)->get();
        return view('blogs.index', $data);
    }
    
}
