<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()->paginate(6);
        return view('home')
        ->with('posts', $posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $recentPosts = Post::published()->limit(3)->get();
        return view('post')
        ->with('post', $post)
        ->with('recentPosts', $recentPosts);
    }

}
