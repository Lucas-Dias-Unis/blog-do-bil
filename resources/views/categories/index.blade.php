@extends('layouts.app')

@section('title', 'Categorias - Blog do Bil')

@section('content')
<h1 style="color: #2c3e50; margin-bottom: 2rem;">Categorias</h1>

@if($categories->count() > 0)
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        @foreach($categories as $category)
            <div class="post-card">
                <h3 style="color: #2c3e50; margin-bottom: 1rem;">{{ $category->name }}</h3>
                
                @if($category->description)
                    <p style="color: #7f8c8d; margin-bottom: 1rem;">{{ $category->description }}</p>
                @endif
                
                <p style="color: #95a5a6;">
                    {{ $category->posts->count() }} 
                    {{ $category->posts->count() == 1 ? 'post' : 'posts' }}
                </p>
                
                @if($category->posts->count() > 0)
                    <a href="{{ route('categories.show', $category->slug) }}" class="btn">Ver posts</a>
                @endif
            </div>
        @endforeach
    </div>
@else
    <div class="post-card">
        <h3>Nenhuma categoria encontrada</h3>
        <p>Ainda não há categorias cadastradas no blog.</p>
    </div>
@endif
@endsection