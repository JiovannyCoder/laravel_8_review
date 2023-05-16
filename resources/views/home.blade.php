@extends('layouts.myApp')
@section('content')

    <h2>Welcome to my Home page</h2>
    <a href="{{ route('post.create') }}" class="link-primary text-decoration-none" >Créer un nouveau post</a>
    <h3>List des articles </h3>
  
    <ul>
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <li><a class="text-text-decoration-none" href="{{ route('post.show', ['id'=>$post->id]) }}">{{ $post->title }}</a></li>
            @endforeach
        @else
            <span>Aucun post en base de données</span>
        @endif
    </ul>
@endsection