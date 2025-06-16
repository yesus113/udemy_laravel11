
<div {{$attributes->merge(['class' => 'w-full border shadow-md rounded-md p-5'])}}>

   @if (@isset($card) )
      <h1>{{$card}}</h1>
   @else
       
   @endif

   {{ $slot }}

</div>