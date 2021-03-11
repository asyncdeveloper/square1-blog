@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end my-4 mr-5">
            @include('layouts.partials.sort-by-publication-date')
        </div>
        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-4" style="">
                    <div class="box jumbotron">
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

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    <script>
        jQuery(document).ready(function($){
            // jQuery code is in here
            $('.box').matchHeight();
        });
    </script>
@stop
