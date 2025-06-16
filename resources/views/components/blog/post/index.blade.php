<div class="text-white">
   
   @if (@isset($header) )
      <h1>{{$header}}</h1>
   @else
      <h1>Sin header</h1>
       
   @endif

@foreach ($posts as $p )

<div class="card card-white mt-2 text-black">

      <h3> {{$p->title}} </h3>

      <a href="{{route('blog.show', $p)}}">IR</a>
      <p>{{$p->description}}</p>

</div>
   @endforeach

<br>

@isset($extra)
   <h1>{{$extra}}</h1> 
@endisset

<h1>{{$footer}}</h1>

   {{$posts->links()}}

</div>
{{-- ESte es un coponente bro, es invocado de esta forma: 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-blog.post.index :posts='$posts'>

    </x-blog.post.index>
</body>
</html> 
 La diferencia se veria en que en las vista 
 no tenemos que colocar el foreach, sino, 
 invocar al componente como  en el ejemplo.....
--}}
