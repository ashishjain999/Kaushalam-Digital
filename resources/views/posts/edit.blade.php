@section('title', 'Create a new post')
@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3>Edit an new Post</h3>

            <form enctype="multipart/form-data" class="form-post" method="post"
                  action="/update/{{$post->id}}">
                @csrf
                <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" placeholder="Post Title"
                           name="post_title" required value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="post_body">What's on your mind?</label>
                    <textarea class="form-control form-post-textarea" rows="3" id="post_body"
                              name="post_body" required>{{$post->text}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Update</button>
                <a class="btn btn-default" href="{{url('/')}}"
                   role="button">Cancel</a>
            </form>
        </div>
    </div>
@endsection
