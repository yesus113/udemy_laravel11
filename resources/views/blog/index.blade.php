@extends('blog.master')

@section('content')

<x-blog.post.index :posts='$posts' >
        @slot('header')
            Post List
        @endslot
        @slot('footer')
            Footer
        @endslot

        @slot('extra')
            Extra
        @endslot
    </x-blog.post.index>

@endsection