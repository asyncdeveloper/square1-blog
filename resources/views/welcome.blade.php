@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end my-4 mr-5">
            @include('layouts.partials.sort-by-publication-date')
        </div>
        <div class="row match-my-cols">
            @forelse($posts as $post)
                <div class="col-md-4 box">
                    <div class="jumbotron">
                        <h2 class="">{{$post->title}}</h2>
                        <p class="lead"> {{$post->description}} </p>
                        <small>By {{ $post->user->name }}</small>
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
