<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'description', 'published_at'];
       
   
    protected $casts = [
        'published_at' => 'datetime:Y-m-d', 
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    
    public function averageRating(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
    
    public function getPublishedAtFormattedAttribute(): string
    {
        return $this->published_at 
            ? $this->published_at->format('d/m/Y') 
            : 'Date inconnue';
    }
}