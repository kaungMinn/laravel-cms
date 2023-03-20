<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class WebsiteController extends Controller
{
    public function home()
    {
        $latestPosts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories = Category::take(5)->get();
        $posts = Post::where('is_published', Post::Published)->paginate(5);
        
        return view('website.index',[
            'posts' => $posts,
            'latestPosts' => $latestPosts,
            'categories' => $categories
        ]);
    }

    public function show(Post $post)
    {
        return view('website.single',[
            'post' => $post
        ]);
    }
}
