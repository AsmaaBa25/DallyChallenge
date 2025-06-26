@extends('layout')
@section('title', ' Add Activites')


@section('content')


<div class="mt-5 mb-5 section">

    <p class="text-justify">You can add new Activites to the main categories list by clicking on the Add button or click
        Cancel.</p>

    <form method="post" action="/activities">
        @csrf
        <div class="form-group">
            <label>Activity Title</label>
            <input type="text" name="activity_title" class="form-control" placeholder="Enter activity name" required>
        </div>

        <div class="form-group">
            <label>Project Title</label>
            <select name="project_id" class="form-select form-control">
                @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>
            @if ($projects->isEmpty())
            <small class="form-text text-muted">يجب إضافة الفئات أولًا قبل اختيارها!</small>
            @endif
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="typeNumber">Duration:</label><small>(in seconds)</small>
                <input type="number" name="duration" id="typeNumber" class="form-control" required min=1>

                <button type="submit" class="btn btn-primary" role="button">Add</button>

                <a href="/activities" role="submit" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection