<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $title = 'Todas as postagens';
        $posts =  Post::all();
        return view('painel.posts.index', compact('title', 'posts'));
    }

    public function trainings()
    {
        $title = 'Treinamentos';
        $posts =  Post::where('type', '0')->get();
        return view('painel.posts.posts', compact('title', 'posts'));
    }

    public function information()
    {
        $title = 'Informações';
        $posts =  Post::where('type', '1');
        return view('painel.posts.posts', compact('title', 'posts'));
    }

    public function create()
    {
        $title = 'Criar post';
        return view('painel.posts.create', compact('title'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('title'));
        $post->description = $request->input('description');
        $post->user_id = $request->input('user_id');
        $post->type = $request->input('type');
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $post = Post::find($id);
        }else{
            $post = Post::where('slug', $id)->first();
        }

        $title = $post->title;
        return view('painel.posts.show', compact('title', 'post'));


    }

    public function edit($id)
    {
        $post = Post::find($id);
        $title = 'Editar post';
        return view('painel.posts.edit', compact('title', 'post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('title'));
        $post->description = $request->input('description');
        $post->user_id = $request->input('user_id');
        $post->type = $request->input('type');
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $post = Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }
}
