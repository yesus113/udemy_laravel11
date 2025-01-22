<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
    function index (){
        $posts = ['Base de datos', 'Tableau'];
    
        return view('contact', compact('posts'));
    }

    function otro ($post){
        echo $post;
    }
}
