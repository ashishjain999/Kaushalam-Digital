@section('title', 'View all posts')
@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach($posts as $post)
                <h3>Blog: {{$post->id}}</h3>
                <h3>Title: {{$post->title}}</h3>
                <h3>Actions:
                    <p>
                        {{strip_tags($post->text)}}
                    </p>
                </h3>
                <a class="btn btn-default btn-sm" href="/edit/{{$post->id}}/{{$post->sef_url}}"
                   role="button">Update</a>
                <a class="btn btn-default btn-sm" href="/delete/{{$post->id}}"
                   role="button">Delete</a>
                <hr/>
            @endforeach
        </div>
    </div>
@endsection
