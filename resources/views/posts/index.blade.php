@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-5">Posts Created by You ({{ auth()->user()->name }})</h3>
        <div class="row match-my-cols mt-5">
            @forelse($posts as $post)
                <div class="col-md-4 box">
                    <div class="jumbotron">
                        <h2 class="">{{$post->title}}</h2>
                        <p class="lead"> {{$post->description}} </p>
                    </div>
                </div>
            @empty
                <h3>No Posts found</h3>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
