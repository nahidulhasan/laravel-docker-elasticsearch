@extends('layouts.master')

@section('title','Create post')

@section('content')
	<h3>Create post</h3>

    <hr>

    <form method="post" action="/posts">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="form-group">
            <label for="content">content</label>
            <textarea class="form-control" name="content" id="content" required></textarea>
        </div>

        <div class="form-group">
        	<input type="submit" name="Create" value="Create">
        </div>
    </form>
@endsection