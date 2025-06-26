@extends('layout')
@section('title', ' Add Categories')


@section('content')

<div class="mt-5 mb-5 section">

    <p class="text-justify">You can add new categories to the main categories list by clicking on the Add button or
        click Cancel.</p>

    <form method="POST" action="/categories">
        @csrf
        <div class="mt-5 form-group section">
            <label for="exampleInputtitle1">New Category Title: </label>
            <input type="text" class="form-control" name="new_title" id="exampleInputtitle1"
                aria-describedby="titleHelp" placeholder="Enter title">
        </div>
        <button type="submit" class="btn btn-primary" role="button">Add</button>
        <a href="/categories" role="submit" class="btn btn-secondary" role="button">Cancel</a>
    </form>
</div>
@endsection