@extends('dashboard.master')

@section('header')
    Header
@endsection

@section ('content')

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('config.store')}}" method="post">
       @include('sensores.configuration._form')
    </form>
@endsection