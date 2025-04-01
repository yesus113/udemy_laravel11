@extends('dashboard.master')

@section('header')
    Header
@endsection

@section ('content')

//Manejo de errores

    @include('dashboard/fragment/_errors-form')

    <form action="{{ route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">

        @method('PATCH')
        @include('dashboard.post._form', [ 'task'=>'edit' ])
        
    </form>
   
@endsection