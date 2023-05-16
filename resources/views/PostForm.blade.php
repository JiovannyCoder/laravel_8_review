@extends('layouts.myApp')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger pt-4">
            We meet some errors. Please, checks these :
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul> 
        </div>
    @endif
    <h2>Créer un nouveau post</h2>
    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" cols="10" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group mt-4">
            Tags  <br>
            @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" id="{{ $tag->id . '.' . $tag->name }}" value="{{ $tag->id }}">
                    <label for="{{ $tag->id . '.' . $tag->name }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="form-action mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
    </form>
@endsection