@extends('layouts.app')

@section('title', 'Categoria: ' . $category->name . ' - Blog do Bil')

@section('content')
<h1 style="color: #2c3e50; margin-bottom: 1rem;">Categoria: {{ $category->name }}</h1>

@if($category->description)
    <p style="color: #7f8c8d; margin-bottom: 2rem; font-size: 1.1rem;">{{ $category->description }}</p>
@endif

@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="post-card">
            <h3 class="post-title">
                <a href="{{ route('posts.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                    {{ $post->title }}
                </a>
            </h3>
            
            <div class="post-meta">
                Por {{ $post->author }} • {{ $post->created_at->format('d/m/Y') }}
            </div>
            
            <div class="post-excerpt">
                {{ $post->excerpt ?? Str::limit($post->content, 200) }}
            </div>
            
            <a href="{{ route('posts.show', $post->slug) }}" class="btn">Ler mais</a>
        </div>
    @endforeach
@else
    <div class="post-card">
        <h3>Nenhum post encontrado</h3>
        <p>Ainda não há posts publicados nesta categoria.</p>
    </div>
@endif

<div style="margin-top: 2rem;">
    <a href="{{ route('categories.index') }}" class="btn">← Voltar para categorias</a>
</div>
@endsection