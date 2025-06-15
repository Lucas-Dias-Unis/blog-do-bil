@extends('layouts.app')

@section('title', 'Todas as Tags - Blog do Bil')

@section('content')
<h1 style="color: #2c3e50; margin-bottom: 2rem;">Todas as Tags</h1>

@if($tags->count() > 0)
    <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
        @foreach($tags as $tag)
            <a href="{{ route('tags.show', $tag->slug) }}" class="btn" style="background-color: #16a085;">
                {{ $tag->name }} ({{ $tag->posts_count }})
            </a>
        @endforeach
    </div>
@else
    <div class="post-card">
        <h3>Nenhuma tag encontrada</h3>
    </div>
@endif
@endsection