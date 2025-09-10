@extends('dashboard.master')
@php
    $header = 'EQUIPOS';
@endphp
@section('content')
    @auth
        @if (auth()->user()->isSuperAdmin())
            <div class="max-w-7xl mx-auto px-6 lg:px-0">
                <a class="btn btn-primary my-3" href="{{ route('config.create') }}" target="_blank">Crear</a>
            </div>
        @endif
    @endauth
    <x-card class="bg-[#242f49] max-w-7xl mx-auto sm:px-6 lg:px-0">
        <div class="grid grid-cols-3 gap-6 p-6">
            @foreach ($config as $c)
                <div class="relative w-full flex justify-left">
                    <!-- Imagen -->
                    <a href="{{ route('config.show', $c) }}">
                        <button class="btn hover:bg-purple-900 mt-3">
                            <img src="{{ asset('static/img/gps.jpg') }}" alt="Antena"
                                class="w-24 h-24 rounded-full shadow-md">
                        </button>
                    </a>

                    <!-- Tooltip -->
                    <div
                        class="absolute top-0 translate-x-40 bg-white border border-orange-300 p-2 shadow-md rounded text-sm w-52 z-10">
                        <p><strong>EQUIPO:</strong> {{ $c->con_equipo }}</p>
                        <p><strong>LATITUD:</strong> {{ $c->con_latitud }}</p>
                        <p><strong>LONGITUD:</strong> {{ $c->con_longitud }}</p>
                        <p><strong>PROPIETARIO:</strong> {{ $c->user->name }}</p>

                        <!-- Flecha -->
                        <div
                            class="absolute -left-2 top-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-orange-300">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
@endsection
