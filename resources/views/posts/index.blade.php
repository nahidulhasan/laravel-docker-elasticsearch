@extends('layouts.master')

@section('title','Article list')


@section('content')

    @if(\Route::getFacadeRoot()->current()->uri() == 'search')
        @foreach($response as $post)

            <b>{{ $post['_source']['title'] }}</b>
            <p>{{ $post['_source']['content'] }}</p>

        @endforeach

   @else
        @foreach($posts as $post)
            <b>{{ $post->title }}</b>
            <p>{{ $post->content }}</p>

        @endforeach

        {{ $posts->links() }}
    @endif

@endsection
