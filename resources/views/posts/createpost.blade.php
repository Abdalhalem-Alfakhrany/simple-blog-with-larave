@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('storepost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">post title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="post title">
                    </div>
                    <div class="form-group">
                        <label for="sub_title">sub title</label>
                        <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="sub title">
                    </div>
                    <div class="form-group">
                        <label for="body">post body</label>
                        <textarea class="form-control" name="body" id="body" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="video_id">youtube video</label>
                        <input type="text" class="form-control" name="video_id" id="video_id">
                    </div>
                    <div class="form-group">
                        <label for="category">{{ __('category') }}</label>
                        <select class="form-control" name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img">post image</label>
                        <input type="file" class="form-control-file" name="img" id="img" placeholder="image">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
