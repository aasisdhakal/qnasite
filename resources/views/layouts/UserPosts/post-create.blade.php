@extends('layouts.app');

@section('content')


<h1 style="text-align: center">Ask a Public Question</h1>

{{ Form::open(['url'=> $route, 'method' => 'POST']) }}


<div class="form-group">

    {{Form::label('title','Title')}}
    {{Form::text('title','',['class' => 'form-control','placeholder' => 'Enter the title'])}}
</div>


<div class="form-group">

    {{Form::label('body','Body')}}
    {{Form::textarea('body','',['class' => 'form-control','id'=>"body" ,'name'=>'body','placeholder' => 'Enter the body'])}}


    {{Form::label('tag','Tag')}}
    {{Form::text('tag','',['class' => 'form-control', 'data-role'=>'tagsinput','placeholder' => 'Enter the tag'])}}

</div>


<br>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}

{{ Form::close() }}


{{--Started tag section--}}


{{--{{ Form::open(['url'=> $tagUrl, 'method' => 'POST']) }}--}}


{{--<div class="form-group">--}}

{{--    {{Form::label('tag','Tag')}}--}}
{{--    {{Form::text('tag','',['class' => 'form-control', 'data-role'=>'tagsinput','placeholder' => 'Enter the tag'])}}--}}
{{--</div>--}}
{{--{{Form::submit('Submit',['class'=>'btn btn-primary'])}}--}}

{{--{{ Form::close() }}--}}



@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif


<<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>



@endsection