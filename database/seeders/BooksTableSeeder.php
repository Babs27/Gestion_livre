<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Le Petit Chaperon Rouge',
            'author' => 'Charles Perrault',
            'description' => 'Un conte classique sur une fillette, un loup et une leçon de prudence.',
            'published_at' => '1697-01-01'
        ]);

        Book::create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'description' => 'Un guide essentiel pour écrire du code lisible, maintenable et de qualité professionnelle.',
            'published_at' => '2008-08-01'

        ]);
    }
}