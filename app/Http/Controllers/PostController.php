<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('posts.index');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request) {
        Post::create($request->validated());

        return redirect(route('posts.index'))->with('success', 'Post created Successfully');
    }
}
