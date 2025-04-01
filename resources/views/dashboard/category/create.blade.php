@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment._errors-form')

   <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.category._form')
   </form>
@endsection