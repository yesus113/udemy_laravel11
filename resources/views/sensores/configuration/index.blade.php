@extends('dashboard.master')
@php
    $header = 'EQUIPOS Y LOCALIZACION';
@endphp
@section('content')
    @auth
        @if (auth()->user()->isSuperAdmin())
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
                <a class="btn btn-primary my-3" href="{{ route('config.create') }}" target="_blank">Crear</a>
            </div>
        @endif
    @endauth
    <x-card class="bg-[#242f49] max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        <!-- Grid responsivo -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-4 sm:p-6">
            @foreach ($config as $c)
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col sm:flex-row items-center sm:items-start gap-4">
                    <!-- Imagen -->
                    <a href="{{ route('config.show', $c) }}">
                        <img src="{{ asset('static/img/gps.jpg') }}" alt="Antena"
                            class="w-24 h-24 rounded-full shadow-md hover:scale-105 transition-transform duration-200">
                    </a>

                    <!-- Info -->
                    <div class="text-xs sm:text-sm text-gray-800">
                        <p><strong>EQUIPO:</strong> {{ $c->con_equipo }}</p>
                        <p><strong>LATITUD:</strong> {{ $c->con_latitud }}</p>
                        <p><strong>LONGITUD:</strong> {{ $c->con_longitud }}</p>
                        <p><strong>PROPIETARIO:</strong> {{ $c->user->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
@endsection
