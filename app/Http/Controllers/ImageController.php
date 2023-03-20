<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ImageController extends Controller
{
    public function download($id)
    {
        $post = Post::find($id);

        $gallery = $post->gallery;

        $imageUrl = $gallery->image;

        return response()->download(public_path($imageUrl));
    }
}
