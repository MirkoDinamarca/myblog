<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Muestra la vista principal del blog
     */
    public function getHome() {
        return view('home');
    }
}
