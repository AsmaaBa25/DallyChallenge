@extends('layout')
@section('title', ' Edit project')


@section('content')
@php
use Illuminate\Support\Facades\DB;
$categories = DB::table('categories')->get(); // جلب الفئات من قاعدة البيانات
@endphp
<div class="mt-5 mb-5 section">

    <p class="text-justify">You can edit the projects you added previously by pressing the Edit button or click Cancel.
    </p>

    <form method="post" action="/projects/update/{{ $project->id }}">
        @csrf
        @method('PUT')
        <div class="mt-5 form-group section">
            <label>Project Title</label>
            <input type="text" name="project_title" class="form-control" value="{{ $project->title }}" required>
        </div>

        <div class="form-group">
            <label>Category Title</label>
            <select class="form-select form-control" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $project->category_id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
        </div>
        <small id="titleHelp" class="form-text text-muted">You must add your
            categories in add category page before!</small>
        <div class="form-group">
            <select name="priority" class="form-control">
                <option value="1" {{ $project->priority == 1 ? 'selected' : '' }}>Highest</option>
                <option value="2" {{ $project->priority == 2 ? 'selected' : '' }}>High</option>
                <option value="3" {{ $project->priority == 3 ? 'selected' : '' }}>Medium</option>
                <option value="4" {{ $project->priority == 4 ? 'selected' : '' }}>Low</option>
                <option value="5" {{ $project->priority == 5 ? 'selected' : '' }}>Lowest</option>
            </select>
        </div>
</div>
<button onclick="document.querySelector('form').submit();" class="btn btn-primary">Edit</button>
<a href="/projects" role="submit" class="btn btn-secondary" role="button">Cancel</a>
</form>
</div>

@endsection