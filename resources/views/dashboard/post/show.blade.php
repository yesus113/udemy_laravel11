@extends('dashboard.master')

@section('header')
    Header
@endsection

@section ('content')
    <h1>{{$post->title}}</h1>

    <span>{{$post->posted}}</span>
    <span>{{$post->category->title}}</span>

    <div>
        {{$post->description}}
    </div>

    <div>
        {{$post->content}}
    </div>

    <img src="/uploads/posts/{{$post->image}}" style="width: 250px" alt="{{$post->title}}">
    {{$post->image}}

@endsection