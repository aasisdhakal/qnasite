@extends('layouts.app')

@section('content')
    @foreach($showPosts->get() as $showPost):

    <div class="card">

        <div class="card-header">
            <a href="#" class="nav-link"><b> {{$showPost->title}}</b></a>
        </div>
        <div class="card-body">
            <p class="card-text">{!!$showPost->body!!}</p>
            <div class="hljs-tag">

                @foreach($showPost->tags as $tag)

                <kbd href="#">{{$tag->name}}</kbd>

                @endforeach

            </div>
            <br>
            <a href="#" class="btn btn-info btn-md">
                {{$showPost->likes->count()}}
                <span class="glyphicon glyphicon-thumbs-down"></span> Like

            </a>
            <a href="#" class="btn btn-info btn-md">
                <span class="glyphicon glyphicon-comment"></span> Comment   </a>

            <small>Asked {{$showPost->created_at->diffForHumans()}} By <a href="#">{{$showPost->user->name}}</a></small>
        </div>
        <br>

    </div>
            @endforeach

    <br>
    @endsection;