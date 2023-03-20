<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

  

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['gallery','category'])->get();
        return view('auth.posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categroies = Category::all();
        return view('auth.posts.create',[
            'categories' => $categroies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      
  

        $request->validate([
            'title' => ['required', 'min:2', 'max: 255', 'string'],
            'category' => ['required'],
            'is_published' => ['required'],
            'file' => ['required', 'image', 'mimes: jpeg,png,jpg,gif,svg', 'dimensions:min_width=406, min_height=503'],
            'description' => ['required', 'min:10', 'max: 5000'],
        ]);

       try{

            DB::beginTransaction();

            if($request->has('file')){
            
                $file = $request->file;
                $fileName = time(). $file->getClientOriginalName();
                $imagePath = public_path('/images/posts') ;
                $file->move($imagePath, $fileName);
                
                $gallery = Gallery::create([
                    'image' => $fileName
                ]);
            }
            
            // Post::create([
            //     'category_id' => $request->category,
            //     'is_published' => $request->boolean(key: 'is_published'),
            //     'title' => $request->title,
            //     'description' => $request->description,
            //     'gallery_id' => $gallery->id
            // ]);

            $post = new Post;
            $post->category_id = $request->category;
            $post->is_published = $request->is_published;
            $post->title = $request->title;
            $post->description= $request->description;
            $post->gallery_id = $gallery->id;
            $post->user_id = auth()->user()->id;
            $post->save();

            DB::commit();

       } catch(\Exception $ex){
        DB::rollBack();
        dd($ex->getMessage());
       }



        $request->session()->flash('alert-success', 'Post Created Successfully');

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('website.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('auth.posts.edit',[
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max: 255', 'string'],
            'category' => ['required'],
            'is_published' => ['required'],
            'file' => ['required', 'image', 'mimes: jpeg,png,jpg,gif,svg', 'dimensions:min_width=406, min_height=503'],
            'description' => ['required', 'min:10', 'max: 5000'],
        ]);

       try{

            DB::beginTransaction();

            if($request->has('file')){
            
                $file = $request->file;
                $fileName = time(). $file->getClientOriginalName();
                $imagePath = public_path('/images/posts') ;
                $file->move($imagePath, $fileName);
                
                $gallery = Gallery::create([
                    'image' => $fileName
                ]);
            }
            
            // Post::create([
            //     'category_id' => $request->category,
            //     'is_published' => $request->boolean(key: 'is_published'),
            //     'title' => $request->title,
            //     'description' => $request->description,
            //     'gallery_id' => $gallery->id
            // ]);

            $post = Post::find($id);
            $post->category_id = $request->category;
            $post->is_published = $request->is_published;
            $post->title = $request->title;
            $post->description= $request->description;
            $post->gallery_id = $gallery->id;
            $post->save();

            DB::commit();

       } catch(\Exception $ex){
        DB::rollBack();
        dd($ex->getMessage());
       }



        $request->session()->flash('alert-success', 'Post Created Successfully');

        return to_route('posts.index');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return back();
    }
}
