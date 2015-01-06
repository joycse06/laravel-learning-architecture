@extends('layouts.default')

@section('content')

    <p>{{ link_to_route('posts.index', 'Return to all posts') }}</p>
    <br/>
    {{ Form::open(array('route' => 'posts.store')) }}
    <div class="title-editable" id="post-title"><h1>Enter post title</h1></div>
    <div class="body-editable" id="post-body"><p>Enter post body</p></div>
    {{ Form::submit('Save Post', array('class' => 'btn btn-primary', 'id' => 'form-submit')) }}

    {{ Form::close() }}
@stop

@include('posts.partials.scripts')