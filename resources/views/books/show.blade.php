@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Section Livre -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $book->title }}</h1>
            <p class="text-gray-600 mb-1"><span class="font-semibold">Auteur:</span> {{ $book->author }}</p>
            <p class="text-gray-600 mb-1"><span class="font-semibold">Publié le:</span> {{ $book->published_at->format('d/m/Y') }}</p>
            <p class="text-gray-700 mt-4">{{ $book->description }}</p>
            
            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800">Note moyenne: 
                    <span class="text-blue-600">{{ number_format($book->averageRating(), 1) }}/5</span>
                </h2>
            </div>
        </div>

        <!-- Section Avis -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Avis des lecteurs</h3>
            
            @if($book->reviews->count() > 0)
                <div class="space-y-4">
                    @foreach($book->reviews as $review)
                        <div class="border-b border-gray-200 pb-4 last:border-0">
                            <div class="flex justify-between items-start">
                                <p class="font-medium text-gray-700" >{{ $review->user->name }}</p>
                                <div class="flex items-center">
                                   <a href="{{ route('reviews.edit', $review) }}" 
                                        style="margin-right: 200px; color: blue; transition: color 0.3s ease;" 
                                        onmouseover="this.style.color='red'" 
                                        onmouseout="this.style.color='blue'">
                                        ✏️Modifier
                                    </a>
                                    <span class="text-yellow-500">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="ml-2 text-gray-600">{{ $review->rating }}/5</span>
                                </div>
                                
                            </div>
                            <p class="text-gray-600 mt-2">{{ $review->comment }}</p>
                            <p class="text-sm text-gray-400 mt-2">
                                Posté le {{ $review->created_at->format('d/m/Y à H:i') }}
                            </p>
                            
                        </div>
                        
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic">Aucun avis pour ce livre pour le moment.</p>
                                    @foreach($book->reviews as $review)
                    <div class="border-b pb-4 mb-4">
                        
                        
                        <div class="mt-2">
                            <a href="{{ route('reviews.edit', $review) }}" 
                            class="text-blue-500 hover:underline text-sm">
                                Modifier cet avis
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
                
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter un avis</h3>            
            <form action="{{ route('reviews.store', $book) }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="user_id" class="block text-gray-700 mb-2">Utilisateur:</label>
                    <select name="user_id" id="user_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Sélectionnez un utilisateur</option>
                        @foreach(App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="rating" class="block text-gray-700 mb-2">Note (1-5):</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <label for="comment" class="block text-gray-700 mb-2">Commentaire:</label>
                    <textarea name="comment" id="comment" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                
                
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    Envoyer l'avis
                </button>

                    <a href="{{ url('/') }}" 
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Retour à l'accueil
            </a>
            </form>
        </div>
    </div>
@endsection