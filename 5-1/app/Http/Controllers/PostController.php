<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use App\Post;

class PostController extends Controller
{
    public function index(Request $request)
    { 
        $users = User::all();
        $posts = Post::orderBy('id', 'DESC')
        ->get();

        return view('index', ['users' => $users, 'posts' => $posts]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = new Post;
        $form = $request->all();
      
      // データベースに保存する
      $post->fill($form);
      $post->save();

      return redirect('/');

    }  

    public function destroy(Request $request)
    {
        //
        $post = Post::find($request->id);
        $post->delete();

        return redirect('/');
    }

}