<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        
        return view('blogs.index', [
            'blogs' => Blog::latest()->filter(request(['search', 'category', 'username']))->paginate(6)->withQueryString(),
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),
        ]);
    }
    public function subscriptionHandler(Blog $blog)
    {
        // auth()->user()->isSubscribed($blog) << same >> User::find(auth()->id())->isSubscribed($blog)
        if(User::find(auth()->id())->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }
        return back();
    }
    public function create()
    {
        return view('blogs.create', [
            'categories' => Category::all(),
        ]);
    }
    public function store()
    {
        $blogCreatedForm =request()->validate([
                'title' => ['required'],
                'slug' => ['required', Rule::unique('blogs', 'slug')],
                'intro' => ['required'],
                'body' => ['required'],
                'category_id' => ['required'],
            ]);
            $blogCreatedForm['user_id'] = auth()->id();
            Blog::create($blogCreatedForm);
        return redirect('/')->with('success', "Blog Created Successfully!");
    }
}
