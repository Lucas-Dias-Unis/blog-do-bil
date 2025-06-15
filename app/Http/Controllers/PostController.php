<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->published()
            ->recent()
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('posts.show', compact('post'));
    }

    //Método para a busca
    public function search(Request $request)
    {
        // 1. Valida o input
        $request->validate([
            'query' => 'required|string|min:3',
        ]);

        // 2. Pega o termo da busca da URL
        $query = $request->input('query');

        // 3. Executa a busca usando o scope que criamos
        $posts = Post::with('category')
            ->published()
            ->search($query) // Usa o novo scope
            ->recent()
            ->get();

        // 4. Retorna a view com os resultados
        return view('search.results', compact('posts', 'query'));
    }
}