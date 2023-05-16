<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function Image()
    {
        return $this->hasOne(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'pivot_post_tag');
    }
}
