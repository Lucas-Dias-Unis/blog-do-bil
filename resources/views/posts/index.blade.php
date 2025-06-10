@extends('layouts.app')

@section('title', 'Todos os Posts - Blog do Bil')

@section('content')
<h1 style="color: #2c3e50; margin-bottom: 2rem;">Todos os Posts</h1>

@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="post-card">
            <h3 class="post-title">
                <a href="{{ route('posts.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                    {{ $post->title }}
                </a>
            </h3>
            
            <div class="post-meta">
                <span class="category-badge">{{ $post->category->name ?? 'Sem categoria' }}</span>
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
        <p>Ainda não há posts publicados no blog.</p>
    </div>
@endif
@endsection