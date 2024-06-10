<?php

namespace App\Http\Controllers;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Muestra la vista principal del blog
     */
    public function getHome() {
        // Obtener solo los posts donde 'habilitated' es 1 (visibles)
        $posts = Post::where('habilitated', 1)->get();
        return view('home', ['posts' => $posts]);
    }
  

}
