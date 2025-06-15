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
        Por {{ $post->author }} • {{ $post->created_at->format('dd/mm/YY') }}
        <article class="post-card">
            <h1 style="color: #2c3e50; margin-bottom: 1rem;">{{ $post->title }}</h1>

            <div class="post-meta" style="margin-bottom: 2rem;">
                <span class="category-badge">{{ $post->category->name ?? 'Sem categoria' }}</span>
                Por {{ $post->author }} • {{ $post->created_at->format('dd/mm/YY H:i') }}

                {{-- ADICIONAR ESTE BLOCO --}}
                @if($post->tags->isNotEmpty())
                <div style="margin-top: 1rem;">
                    @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag->slug) }}" class="btn" style="background-color: #16a085; font-size: 0.8rem; padding: 0.2rem 0.5rem;">
                        {{ $tag->name }}
                    </a>
                    @endforeach
                </div>
                @endif
                {{-- FIM DO BLOCO --}}

            </div>

            <div style="line-height: 1.8; font-size: 1.1rem;">
                {!! nl2br(e($post->content)) !!}
            </div>
        </article>
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