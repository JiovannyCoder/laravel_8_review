@extends('layouts.myApp')
@section('content')

    <h2>Créer un nouveau post</h2>
    <form method="POST" action="{{ route('post.modify') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" hidden value="{{ $post->id }}" >
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}" >
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" cols="10" rows="4">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group mt-4">
            Tags  <br>
            @foreach($tags as $tag)
                <div>
                    <input {{ $post->tags->contains($tag) ? 'checked' : '' }} type="checkbox" name="tags[]" id="{{ $tag->id . '.' . $tag->name }}" value="{{ $tag->id }}">
                    <label for="{{ $tag->id . '.' . $tag->name }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="form-action mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>

@endsection