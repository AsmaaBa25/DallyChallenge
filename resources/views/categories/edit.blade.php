@extends('layout')
@section('title', ' Edit Categories')


@section('content')

<div class="mt-5 mb-5 section">

    <p class="text-justify">You can edit the categories you have previously added by pressing the Edit button.</p>
    <p class="text-justify">You are going to edit category with id {{ $category->id }}</p>
    <form action="/categories" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $category->id }}" />
        <div class="mt-5 form-group section"><br>
            Category Title:
            <input value="{{ $category->title }}" name="title" type="text" class="form-control" id="exampleInputtitle1"
                aria-describedby="titleHelp" placeholder="Enter new title"><br>
            <button type="submit" class="btn btn-primary" role="button">Edit</button>
            <a href="/categories" role="submit" class="btn btn-secondary" role="button">Cancel</a>
        </div>
    </form>
</div>
@endsection