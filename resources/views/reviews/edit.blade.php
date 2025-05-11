@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Modifier l'avis</h1>
    
    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('reviews.update', $review) }}" method="POST">
        @csrf
        @method('PUT')
        
        <input type="hidden" name="user_id" value="{{ $review->user_id }}">
        
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Auteur :</label>
            <p class="p-2 bg-gray-100 rounded">{{ $review->user->name }}</p>
        </div>
        
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Note (1-5) :</label>
            <input type="number" name="rating" min="1" max="5" 
                   value="{{ old('rating', $review->rating) }}"
                   class="w-full p-2 border rounded" required>
        </div>
        
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Commentaire :</label>
            <textarea name="comment" rows="4"
                      class="w-full p-2 border rounded" required>{{ old('comment', $review->comment) }}</textarea>
        </div>
        
        <button type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Enregistrer
        </button>
        
        <a href="{{ route('books.show', $review->book) }}" 
           class="ml-4 text-gray-600 hover:text-gray-800">
            Annuler
        </a>
    </form>
</div>
@endsection