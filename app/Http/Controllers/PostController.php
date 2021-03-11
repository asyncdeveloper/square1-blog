<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        return view('posts.index', [
            'posts' => $request->user()->posts()->paginate()
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request) {
        Post::create($request->validated());

        return redirect(route('posts.index'))->with('success', 'Post created Successfully');
    }
}
