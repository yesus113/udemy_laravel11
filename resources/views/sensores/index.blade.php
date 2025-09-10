@extends('dashboard.master')
@php
    $tarjetas = [
        [
            'titulo' => 'DHT11',
            'imagen' => 'static/img/sensores/dht11.jpg',
            'ruta' => route('dht11.TGR'),
        ],
        [
            'titulo' => 'GUVA',
            'imagen' => 'static/img/sensores/guva.jpg',
            'ruta' => route('guva.TGR'),
        ],
        [
            'titulo' => 'LM35',
            'imagen' => 'static/img/sensores/lm35.jpg',
            'ruta' => route('lm35.TGR'),
        ],
        [
            'titulo' => 'MQ135',
            'imagen' => 'static/img/sensores/mq135.png',
            'ruta' => route('mq135.TGR'),
        ],
        [
            'titulo' => 'TCS3200',
            'imagen' => 'static/img/sensores/tcs3200.jpg',
            'ruta' => route('tcs3200.index'),
        ],
        [
            'titulo' => 'LDR',
            'imagen' => 'static/img/sensores/fotocelda.jpg',
            'ruta' => route('foto.TGR'),
        ],
    ];
@endphp
@section('content')
<div class="px-8 py-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-items-center max-w-7xl mx-auto">
        @foreach ($tarjetas as $tarjeta)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md w-[300px] dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ $tarjeta['ruta'] }}">
                    <img src="{{ asset($tarjeta['imagen']) }}" alt="{{ $tarjeta['titulo'] }}"
                        class="w-full h-48 object-cover rounded-t-lg">
                </a>
                <div class="p-4 text-center">
                    <h5 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $tarjeta['titulo'] }}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

