@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a Post</div>

                    <div class="card-body">
                        @include('layouts.partials.alert')
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publication_date" class="col-md-4 col-form-label text-md-right">Publication Date</label>
                                <div class="col-md-6">
                                    <input name="publication_date" id="publication_date" class="form-control" type="datetime-local" >
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
