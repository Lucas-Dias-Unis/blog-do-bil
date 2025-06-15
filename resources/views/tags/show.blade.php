@extends('layouts.app')

@section('title', 'Posts com a tag: ' . $tag->name)

@section('content')
<h1 style="color: #2c3e50; margin-bottom: 2rem;">
    Posts com a tag: <span class="btn" style="background-color: #16a085;">{{ $tag->name }}</span>
</h1>

@if($posts->count() > 0)
    @foreach($posts as $post)
        {{-- Reutilizando o card de post --}}
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
        <h3>Nenhum post encontrado com esta tag.</h3>
    </div>
@endif

<div style="margin-top: 2rem;">
    <a href="{{ route('tags.index') }}" class="btn">← Ver todas as tags</a>
</div>
@endsection
