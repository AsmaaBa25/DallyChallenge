@extends('layout')
@section('title', ' Add project')


@section('content')
@php
use Illuminate\Support\Facades\DB;
$categories = DB::table('categories')->get(); // جلب الفئات من قاعدة البيانات
@endphp


<div class="mt-5 mb-5 section">

    <p class="text-justify">You can add new projects to the list of main projects by clicking the Add button or clicking
        Cancel.</p>

    <form method="post" action="/projects">
        @csrf
        <div class="mt-5 form-group section">
            <label>Project Title</label>
            <input type="text" name="project_title" class="form-control" aria-describedby="titleHelp"
                placeholder="Enter title" required>

        </div>

        <div class="form-group ">
            <label>Category Title</label>

            <select class="form-select form-control" name="category_title">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @if ($categories->isEmpty())
            <small class="form-text text-muted">يجب إضافة الفئات أولًا قبل اختيارها!</small>
            @endif

            <small id="titleHelp" class="form-text text-muted">You must add your categories in add category page
                before!</small>
        </div>

        <div class="form-group ">
            <label>Priority</label>
            <select name="priority" class="form-control">
                <option value="1">Highest</option>
                <option value="2">High</option>
                <option value="3">Medium</option>
                <option value="4">Low</option>
                <option value="5">Lowest</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" role="button">Add</button>
        <a href="/projects" role="submit" class="btn btn-secondary" role="button">Cancel</a>
    </form>
</div>
@endsection