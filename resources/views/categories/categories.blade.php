@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-columns">
                    @foreach ($CategoriesWithPosts as $i => $CategoryWithItsPosts)
                        @php
                            $category = $CategoryWithItsPosts['category'];
                            $posts = $CategoryWithItsPosts['posts'];
                        @endphp

                        <div class="alert alert-primary d-flex justify-content-center" role="alert">
                            <strong>
                                <a href="{{ route('category', $category) }}" class="">
                                    {{ $category->title }}
                                </a>
                            </strong>
                        </div>
                        <div id="{{ 'categories' . $i }}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">

                                @foreach ($posts as $j => $post)
                                    @if ($j == 0)

                                        <div class="carousel-item active">
                                            <div class="d-flex justify-content-center">
                                                <img style="max-width: 500px; width: 100%"
                                                    src="{{ asset("storage/posts-imgs/$post->img") }}" alt="post img">
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $post['title'] }}</h5>
                                                    <p class="card-text">{{ $post['sub_title'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item ">
                                            <div class="d-flex justify-content-center">
                                                <img style="max-width: 500px; width: 100%"
                                                    src="{{ asset("storage/posts-imgs/$post->img") }}" alt="post img">
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $post['title'] }}</h5>
                                                    <p class="card-text">{{ $post['sub_title'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach

                                <a class="carousel-control-prev" href="#{{ 'categories' . $i }}" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#{{ 'categories' . $i }}" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
