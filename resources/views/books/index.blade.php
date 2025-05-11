@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Liste des Livres</h1>
        
        @if($books->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($books as $book)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold mb-2 text-gray-700">{{ $book->title }}</h2>
                            <p class="text-gray-600 mb-4">Auteur: {{ $book->author }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">
                                    Publié le: {{ $book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('d/m/Y') : 'Date inconnue' }}
                                </span>
                                <a href="{{ route('books.show', $book) }}" 
                                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                                    Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8 flex justify-center">
                {{ $books->links('vendor.pagination.tailwind') }}
            </div>
        @else
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                <p class="text-yellow-700">Aucun livre disponible pour le moment.</p>
            </div>
        @endif
    </div>
@endsection