@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($posts as $post)
                    <div class="card mt-4 mb-4">
                        <div class="d-flex justify-content-center">
                            <img style="max-width: 500px; width: 100%" src="{{ asset("storage/posts-imgs/$post->img") }}"
                                alt="post img">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('post', $post['id']) }}">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <h6 class="card-subtitle text-muted">{{ $post->sub_title }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex  justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
