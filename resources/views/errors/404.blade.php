@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16 text-center">
    <div class="max-w-md mx-auto" style="margin-top: 11%;">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">404</h1>
        <p class="text-xl text-gray-600 mb-8">
            Oups ! La page que vous cherchez n'existe pas.
        </p>

        <a href="{{ url('/') }}" 
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-lg transition-colors">
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection