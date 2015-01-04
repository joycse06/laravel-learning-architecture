@extends('layouts.default')

@section('content')
<div class="jumbotron">
    <h1>Welcome to Saphira - A demo Laravel Application!</h1>

    <p>This is a laravel app with a good architecture. Why dont you roam around the site to check other features?</p>

    @if ( ! $currentUser)
    <p>
        {{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}
    </p>
    @endif
</div>
@stop