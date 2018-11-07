@extends('layouts.app')
@section('content')
    <p><br><br><h1>Posts</h1></P>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/laravel1/public/storage/cover_images/{{$post->cover_image}}" alt="cover image">
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3><a href="/laravel1/public/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                    
                </div>
                
            
            </div>
            @if(Auth::user()->id == $post->user_id)
                        <a href="/laravel1/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    @endif
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection