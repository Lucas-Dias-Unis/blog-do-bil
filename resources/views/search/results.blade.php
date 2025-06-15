@extends('layouts.app')

@section('title', 'Resultados para "' . e($query) . '" - Blog do Bil')

@section('content')
<h1 style="color: #2c3e50; margin-bottom: 2rem;">
    Resultados da busca por: <span style="color: #3498db;">"{{ e($query) }}"</span>
</h1>

@if($posts->count() > 0)
    <p style="margin-bottom: 2rem; color: #7f8c8d;">
        Encontrados {{ $posts->count() }} {{ $posts->count() == 1 ? 'resultado' : 'resultados' }}.
    </p>

    @foreach($posts as $post)
        <div class="post-card">
            <h3 class="post-title">
                <a href="{{ route('posts.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                    {{-- Opcional: Destacar o termo buscado no título --}}
                    {!! str_ireplace($query, "<mark>{$query}</mark>", e($post->title)) !!}
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
        <h3>Nenhum resultado encontrado</h3>
        <p>Tente buscar por outros termos.</p>
    </div>
@endif

<div style="margin-top: 2rem;">
    <a href="{{ route('home') }}" class="btn">← Voltar para a página inicial</a>
</div>
@endsection
