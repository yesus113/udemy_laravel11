<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){
        
        return view('home.template.index');
    }
   /* function index (){
        $posts = ['Base de datos', 'Tableau'];
    
        return view('contact', compact('posts'));
    }

    function otro ($post){
        echo $post;
    }*/
}
