<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    //
    public function index(){
        $filters = request(['search','category','author']);
        return view('blogs.index', ['blogs' => Blog::with('category','user')->filter($filters)->latest()->paginate(6)->withQueryString() , 'categories' => Category::all()]);
    }
    public function show(Blog $blog) {
        return view('blogs.show', ['blog' => $blog,'randomBlogs'=> Cache::remember('randomBlogs', now()->seconds(5), function () use ($blog) {
          
            return Blog::with('category','user')
            ->whereHas('category',function($query) use ($blog){
                
                $query->where('slug',$blog->category->slug);
            })
            ->inRandomOrder()->take(3)->get();
        })]);
    }
}


