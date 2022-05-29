<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index(Request $request){
        if($request->search){
            $posts = Post::where('title', 'like', '%' . $request->search . '%')->latest()->paginate();
        } elseif($request->category){
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate()->withQueryString();
        }
        else{
            $posts = Post::latest()->paginate();
        }

        $categories = Category::all();
       
        return view('blogPosts.blog', compact('posts', 'categories'));
    }
/////////////////////////////////////



////////////////////////////////////
    public function create(){
        $categories = Category::all();
        return view('blogPosts.create-blog-post', compact('categories'));
    }

    public function store(Request $request){
        
       $request->validate([
           'title' => 'required',
           'price' => 'required',
           'cal' => 'required',
           'desription'=>'required',
           'image' => 'required | image',
           'category_id' => 'required'
       ]);
       
       $title = $request->input('title');
       $price = $request->input('price');
       $cal = $request->input('cal');
       $desription = $request->input('desription');
       $category_id = $request->input('category_id');
       
       if(Post::latest()->first() !== null){
        $postId = Post::latest()->first()->id + 1;
       } else{
           $postId = 1;
       }

       $slug = Str::slug($title, '-') . '-' . $postId;
       $user_id = Auth::user()->id;

       //File upload
       //$imagePath = $request->file('image')->store('images');
        $dest_path = 'images';
        $image= $request->file('image');
        $image_name =$image->getClientOriginalName();
        $imagePath =$request->file('image')->storeAs($dest_path , $image_name);


       $post = new Post();
       $post->title = $title;
       $post->price = $price;
       $post->cal = $cal;
       $post->desription = $desription;
       $post->category_id = $category_id;
       $post->slug = $slug;
       $post->user_id = $user_id;
       $post->imagePath = $imagePath;

       $post->save();
       
       return redirect()->back()->with('status', 'Post Created Successfully');
    }

    public function edit(Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        return view('blogPosts.edit-blog-post', compact('post'));
    }

    public function update(Request $request, Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'cal' => 'required',
            'desription'=>'required',
            'image' => 'required | image',
        ]);
        
        $title = $request->input('title');
        $price = $request->input('price');
        $cal = $request->input('cal');
        $desription = $request->input('desription');
        $postId = $post->id;
        $slug = Str::slug($title, '-') . '-' . $postId;
 
        //File upload
        $dest_path = 'images';
        $image= $request->file('image');
        $image_name =$image->getClientOriginalName();
        $imagePath =$request->file('image')->storeAs($dest_path , $image_name);
 
        
        $post->title = $title;
        $post->price = $price;
        $post->cal = $cal;
        $post->desription = $desription;
        $post->slug = $slug;
        $post->imagePath = $imagePath;
 
        $post->save();
        
        return redirect()->back()->with('status', 'Post Edited Successfully');
    }

    // public function show($slug){
    //     $post = Post::where('slug', $slug)->first();
    //     return view('blogPosts.single-blog-post', compact('post'));
    // }

    // Using Route model binding
    public function show(Post $post){
        $category = $post->category;

        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('blogPosts.single-blog-post', compact('post', 'relatedPosts'));
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('status', 'Post Delete Successfully');
    }
}
