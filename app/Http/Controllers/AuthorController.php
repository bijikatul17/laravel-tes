<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() 
    {
        return view('authors', [
            "title" => "Authors",
            "active" => 'authors',
            // "authors" => Author::latest()->filter(request(['search', 'user','category', 'author']))->paginate(7),
            "users" => User::latest()->get()
            // "authors" => Author::latest()->filter(request(['search', 'category', 'author']))->get()
            // "authors" => Author::with(['author', 'category'])->latest()->get()
        ]);
    }

    public function show(Author $author)
    {
        return view('posts', [
            'title' => "Post by Author : $author->user->username",
            "active" => 'authors',
            'posts' => $author->post->loadload('user', 'category', 'author')
            // 'author' => $author->username,
            // "post" => $post->load('category', 'author')
        ]);
    }
}
