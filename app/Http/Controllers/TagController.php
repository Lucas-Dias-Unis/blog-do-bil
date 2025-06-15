<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Lista todas as tags
    public function index()
    {
        $tags = Tag::withCount('posts')->get();
        return view('tags.index', compact('tags'));
    }

    // Mostra todos os posts de uma tag específica
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        
        $posts = $tag->posts()
            ->published()
            ->recent()
            ->get();

        return view('tags.show', compact('tag', 'posts'));
    }
}
