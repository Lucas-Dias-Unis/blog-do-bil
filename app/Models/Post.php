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
}