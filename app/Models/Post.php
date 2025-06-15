<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'category_id',
        'author',
        'published'
    ];

    protected $casts = [
        'published' => 'boolean'
    ];

    // Relacionamento: Um post pertence a uma categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scope para posts publicados
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    // Scope para posts recentes
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    //Scope para a busca
    public function scopeSearch($query, $term)
    {
        // Agrupa as condições para que o OR funcione corretamente
        return $query->where(function ($query) use ($term) {
            $query->where('title', 'like', "%{$term}%")
                  ->orWhere('content', 'like', "%{$term}%");
        });
    }

    // NOVO: Relacionamento Muitos-para-Muitos com Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    // ... (scopes) ...
}