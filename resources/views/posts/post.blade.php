@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <img style="max-width: 500px; width: 100%" src="{{ asset("storage/posts-imgs/$post->img") }}"
                        alt="post img">
                </div>
                <h1>{{ $post['title'] }}</h1>
                <h4>{{ $post['body'] }}</h4>
            </div>
        </div>
    </div>
@endsection
