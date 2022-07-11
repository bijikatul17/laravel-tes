<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() 
    {
        return view('categories', [
            "title" => "Categories",
            "active" => 'categories',
            "categories" => Category::latest()->filter(request(['search', 'user','category', 'author']))->paginate(7)
            // "categories" => Category::latest()->filter(request(['search', 'category', 'author']))->get()
            // "categories" => Category::latest()->paginate(2)
            // "categories" => Category::with(['author', 'category'])->latest()->get()
        ]);
    }

    public function show(Category $category)
    {
        return view('posts', [
            'title' => "Post by Category : $category->name" ,
            "active" => 'categories',
            'posts' => $category->posts->load('user', 'category', 'author')
            // 'posts' => $category->load('category', 'author')
            // 'category' => $category->name,
        ]);
    }
}
