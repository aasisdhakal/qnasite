@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <button class="btn btn-success" onclick="location.href='{{route('add_post')}}'">Ask Question</button>

                        <button class="btn btn-outline-primary" onclick="location.href='{{route('show_posts',auth()->id())}}'">Questions that you asked</button>

                </div>
            </div>

        </div>


    </div>

    @foreach($getAllPosts as $getAllPost):

    <div class="card">

        <div class="card-header">
            <a href="#" class="nav-link"><b> {{$getAllPost->title}}</b></a>
        </div>
        <div class="card-body">
            <p class="card-text">{!!$getAllPost->body!!}</p>

            <div class="hljs-tag">
                @foreach($getAllPost->tags as $tags )

                <kbd href="#">{{$tags->name}}</kbd>
                @endforeach

            </div>
            <br>
            <button onclick="location.href='{{route('likes',auth()->id())}}'" class="btn-md glyphicon glyphicon-thumbs-up">
                {{$getAllPost->likes->count()}}

                 Like

            </button>
            <a href="#" class="btn btn-info btn-md">
                <span class="glyphicon glyphicon-comment"></span> Comment   </a>

            <small>Asked {{$getAllPost->created_at->diffForHumans()}} By <a href="#">{{$getAllPost->user->name}}</a></small>
        </div>
        <br>

    </div>
    @endforeach
</div>

@endsection
