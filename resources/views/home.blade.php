@extends('layouts.app')

@section('title', 'Blog do Bil - Página Inicial')

@section('content')
<div style="text-align: center; margin-bottom: 3rem;">
    <h1 style="color: #2c3e50; margin-bottom: 1rem;">Bem-vindo ao Blog do Bil!</h1>
    <p style="font-size: 1.2rem; color: #7f8c8d;">
        Aqui você encontra os melhores conteúdos sobre tecnologia, programação e muito mais.
    </p>
</div>

<h2 style="color: #2c3e50; margin-bottom: 2rem;">Posts Recentes</h2>

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