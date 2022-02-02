@extends('blog::layouts.master')

@section('content')
    <h1>Posts</h1>
    <p>
        This view is loaded from module: {!! config('blog.name') !!}
    </p>

    <ul>
    @foreach ($posts as $post)
        <li>{{ $post->title }} - {{ $post->author }}</li>
    @endforeach
    </ul>

@endsection
