@extends('layout')
@section('title', ' Edit Activites')


@section('content')


<div class="mt-5 mb-5 section">

    <p class="text-justify">You can edit the Activities you have previously added by pressing the Edit button or click
        Cancel.</p>

    <form method="post" action="/activities/{{ $activity->id }}">

        @csrf
        @method('PUT')
        <div class="mt-5 form-group">
            <label>Activity Title</label>
            <input type="text" name="activity_title" class="form-control" value="{{$activity->title}}"
                placeholder="Enter title">

        </div>

        <div class="form-group">
            <label>Project Title</label>
            <select name="project_id" class="form-select form-control">
                @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $activity->project_id ? 'selected' : '' }}>
                    {{ $project->title }}
                </option>
                @endforeach

            </select>
            <label class="form-label" for="typeNumber">Duration:</label><small>(in seconds)</small>
            <input type="number" name="duration" value="{{ $activity->duration }}" class="form-control" min=1 required>
        </div>
        <button onclick="document.querySelector('form').submit();" class="btn btn-secondary">Edit</button>

        <a href="/activities" role="submit" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection