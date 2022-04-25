<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showBlog(User $user)
    {
        return view('blogs.index', [
            'blogs' => $user->blogs,
            'categories' => Category::all()
        ]);
    }
}
