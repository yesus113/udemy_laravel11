@extends('dashboard.master')

@section('content')
    <div class="flex justify-start p-4">
        <a href="{{ route('charts') }}">
            <button type="button"
                class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 inline-flex items-center dark:border-blue-600 dark:text-blue-600 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                <svg class="w-5 h-5 transform rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                <span class="sr-only">Volver</span>
            </button>
        </a>
    </div>
    <x-card class=" bg-slate-800">
        @slot('card')
        @endslot

        <div class=" justify-center w-full h-full">

            <div>
                <x-charts.tipo-piel-chart />
            </div>
        </div>
        <br>
    </x-card>
@endsection
