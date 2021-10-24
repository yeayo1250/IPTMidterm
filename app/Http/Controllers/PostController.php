<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function showauthors() {
        $users = User::all();
        return view('showauthors', compact('users'));
    }

    public function postscategory(Category $category) {
        $posts = Post::where('category_id', $category->id)->get();
        return view('postscategory', compact('posts', 'category'));
    }

    public function showauthorposts(User $user) {
        $posts = Post::where('user_id', $user->id)->get();
        return view('showauthorposts', compact('posts', 'user'));
    }

    public function createnewpost() {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function storenewpost(Request $request) {
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'post' => 'required',
        ]);

        Post::create([
            'user_id'   => auth()->user()->id,
            'category_id' => $request->category_id,
            'post'      => $request->post
        ]);

        return redirect('/dashboard');
    }
}
