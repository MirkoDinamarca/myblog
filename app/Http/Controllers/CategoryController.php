<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra todas las categorías
     */
    public function getIndex() {
        $data['posts'] = Post::all();
        return view('category.index', $data);
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
