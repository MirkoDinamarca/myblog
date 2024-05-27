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

}
