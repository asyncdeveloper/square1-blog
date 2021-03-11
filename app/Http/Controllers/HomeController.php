<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('homepage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homepage(Request $request) {
        $posts = Post::with('user');

        if($sortByPublicationDate = $request->sort_by === 'publication_date')
            $posts = $posts->orderBy('publication_date', 'desc');

        return view('welcome', [
            'posts' => $posts->paginate()->withQueryString(),
            'sortByPublicationDate' => $sortByPublicationDate
        ]);
    }
}
