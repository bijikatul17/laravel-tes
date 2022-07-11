<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {   
        $title='';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        // if(request('user')) {
        //     $author = Author::firstWhere('username', request('author'));
        //     $title = ' by ' . $author->user->username;
        // }
        if(request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->username;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'user', 'category', 'author']))->paginate(7)->withQueryString()
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get()
            // "posts" => Post::all(),
            // "posts" => Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            // "post" => $post
            "post" => $post->load('user', 'category', 'author')
        ]);
    }
}
