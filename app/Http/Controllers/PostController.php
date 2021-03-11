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
        $posts = $request->user()->posts();

        if($sortByPublicationDate = $request->sort_by === 'publication_date')
            $posts = $posts->orderBy('publication_date', 'desc');

        return view('posts.index', [
            'posts' => $posts->paginate()->withQueryString(),
            'sortByPublicationDate' => $sortByPublicationDate
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
