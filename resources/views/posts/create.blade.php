@section('title', 'Create a new post')
@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3>Create a new Post</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form enctype="multipart/form-data" class="form-post" method="post" action="/create">
                @csrf
                <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" placeholder="Post Title"
                           name="post_title" required>
                </div>
                <div class="form-group">
                    <label for="post_body">What's on your mind?</label>
                    <textarea class="form-control form-post-textarea" rows="3" id="post_body"
                              name="post_body" required></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection
