<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['guest'])->only('store', 'destroy');
    }

    public function index(){
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        //'with' permite limitar las peticiones a la base de datos
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function mostrar(Post $post){
        return view('posts.mostrar', [
            'post' => $post
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'cuerpo' => 'required'
        ]);
        
        $request->user()->posts()->create($request->only('cuerpo'));

        return back();
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }

}
