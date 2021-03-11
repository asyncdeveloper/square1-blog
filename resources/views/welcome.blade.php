@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row match-my-cols">
            @foreach($posts as $post)
                <div class="col-md-4 box">
                    <div class="jumbotron card">
                        <h2 class="">{{$post->title}}</h2>
                        <p class="lead"> {{$post->description}} </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
