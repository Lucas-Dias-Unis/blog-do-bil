@extends('layouts.app')

@section('title', $post->title . ' - Blog do Bil')

@section('content')
<article class="post-card">
    <h1 style="color: #2c3e50; margin-bottom: 1rem;">{{ $post->title }}</h1>

    <div class="post-meta" style="margin-bottom: 2rem;">
        <span class="category-badge">{{ $post->category->name ?? 'Sem categoria' }}</span>
        Por {{ $post->author }} • {{ $post->created_at->format('d/m/Y H:i') }}
        <article class="post-card">
            <h1 style="color: #2c3e50; margin-bottom: 1rem;">{{ $post->title }}</h1>

            <div class="post-meta" style="margin-bottom: 2rem;">
                <span class="category-badge">{{ $post->category->name ?? 'Sem categoria' }}</span>
                Por {{ $post->author }} • {{ $post->created_at->format('d/m/Y H:i') }}

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

    <div style="line-height: 1.8; font-size: 1.1rem;">
        {!! nl2br(e($post->content)) !!}
    </div>
</article>

<div style="margin-top: 2rem;">
    <a href="{{ route('posts.index') }}" class="btn">← Voltar para todos os posts</a>
</div>
@endsection