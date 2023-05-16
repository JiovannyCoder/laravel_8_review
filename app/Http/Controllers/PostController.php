<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    public function index()
    {
        $title = 'Acceuil';
        $posts = Post::all();
        
        return view('home', compact('posts', 'title'));
    }


    public function show($id)
    {
        $title = 'Article ' . $id;
        $post = Post::findOrFail($id);
        

        return view('article', [
            'post' => $post,
            'title' => $title
        ]);
    }

    public function contact()
    {
        $title = 'Contact';
        return view('contact', compact('title'));
    }

    public function create()
    {
        $title = 'New post';
        $tags = Tag::all();

        return view('PostForm', compact('title', 'tags'));
    }

    public function store(Request $request)
    {
        // form validation
        $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'content' => ['required']
        ]);

        
        // post save 
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        
        // image process
       if($request->has('image') && !is_null($request->image)) {
            $filename = time().'_POST_' . $post->id. '.' . $request->image->extension();

            $path = $request->file('image')->storeAs(
                'images',
                $filename,
                'public'
            );
            
            // image save
            $image = new Image();
            $image->path = $path;

            $post->image()->save($image);
       }
        
        //tags save
        $post->tags()->attach($request->tags);

        dd('post crée');
    }

    public function update($id)
    {
        $title = 'Update post '. $id;
        $post = Post::findOrFail($id);
        $tags = Tag::all();        

        return view('PostUpdate', [
            'title' => $title,
            'post' => $post,
            'tags' => $tags
        ]);
    }

    public function modify(Request $request)
    {   
        // form validation
        $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'content' => ['required']
        ]);
        
        // post update
        $post = Post::findOrFail($request->id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // image process
        if($request->has('image') && !is_null($request->image)) {
            // new image process
            $filename = time().'_POST_' . $post->id. '.' . $request->image->extension();
            $path = $request->file('image')->storeAs(
                'images',
                $filename,
                'public'
            );

            // verify if we must update the image or create it
            if(!is_null($post->image)) {
                Storage::disk('public')->delete($post->image->path); // delete the old image in storage
                $post->image->update([
                    'path' => $path
                ]);

            } else {
                $image = new Image();
                $image->path = $path;
                $post->image()->save($image);
            }
       }

        //tags update
        $post->tags()->sync($request->tags);

        return redirect('/');
    }
}
