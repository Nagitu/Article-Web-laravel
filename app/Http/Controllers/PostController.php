<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;


class PostController extends Controller
{
    
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Membuat slug dari title
        $slug = Str::slug($request->title, '-');

        // Membuat post baru
        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'author_id' => Auth::id(), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ]);

        // Redirect ke halaman post yang baru dibuat atau tampilkan pesan sukses
        return redirect()->route('dashboard');
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $user = Auth::user();
        return view('post', ['title' => 'blog', 'post' => $post, 'user' => $user]);
    }

    public function showByAuthor(User $user) {
        $author = Auth::user(); // Mengambil data pengguna yang sedang login
        $posts = $user->posts;  // Mengambil postingan dari pengguna yang diberikan
    
        return view('posts', ['title' => 'Blog', 'posts' => $posts, 'user' => $author]);
    }
    
    
    public function showAllPost (){
        $user = Auth::user();
        $posts = Post::with('author')->latest();
        if(request('search')){
             $posts->where('title','like','%'.request('search').'%');
        };
        return view('posts',['title'=>'blog', 'posts'=> $posts->get(),'user'=>$user]);
    }
}
