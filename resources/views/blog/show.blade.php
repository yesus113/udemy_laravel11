@extends('blog.master')

@section('content')
    <br><br>

    <x-card class="text-white bg-black">
        @slot('card')
            Titulo de la card
        @endslot
    </x-card>

    <x-card class="bg-yellow-50">    
        @slot('card')
            Contenido Dinamico
        @endslot

    </x-card>

    <x-blog.post.show :post="$post" title='Titulo del componente' />

@endsection