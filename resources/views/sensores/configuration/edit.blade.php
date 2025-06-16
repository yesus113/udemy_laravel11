@extends('dashboard.master')

@section('header')
    Configuracion
@endsection

@section ('content')

{{-- Manejo de errores --}}

    @include('dashboard/fragment/_errors-form')

    <form action="{{ route('config.update', $config->id)}}" method="post" enctype="multipart/form-data">

        @method('PATCH')
        @include('sensores.configuration._form', [ 'task'=>'edit' ])
        
    </form>
   
@endsection