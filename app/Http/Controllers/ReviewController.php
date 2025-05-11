<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{ 
    public function store(Request $request, Book $book)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500',
        ]);
        
        $book->reviews()->create($validated);
        
        return back()->with('success', 'Avis ajouté avec succès!');
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500'
        ]);

        $review->update($validated);

        return redirect()->route('books.show', $review->book)
               ->with('success', 'Avis modifié avec succès!');
               
    }

            public function edit(Review $review)
        {
            return view('reviews.edit', [
                'review' => $review
            ]);
        }
}