@extends('layouts.myApp')
@section('content')

    <h2>{{ $post->title }}</h2>
     @if(!is_null($post->image))
        <img src="{{ Storage::url($post->image->path) }}" alt="">
    @else 
    <img with="200px" height="200px" src="{{ Storage::url('default.png') }}" alt="">
    @endif


    <br>
    @forelse($post->tags as $tag)
        <span class="badge bg-info">{{ $tag->name }}</span>
    @empty
        <p class="text-info">Pas de tags pour ce post</p>
    @endforelse
    <p>{{ $post->content }}</p>
    
    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Retour</a>
    <a href="{{ route('post.update', ['id'=>$post->id]) }}" class="btn btn-primary">Modifier</a>
    
@endsection