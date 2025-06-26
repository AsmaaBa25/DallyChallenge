@extends('layout')
@section('title', 'project')

@section('content')
@php
$projects = DB::table('projects')
->join('categories', 'projects.category_id', '=', 'categories.id')
->select('projects.*', 'categories.title as category_title')
->orderBy('priority', 'asc')
->get();
@endphp

<div class="mt-5 section">
    <p class="text-justify ">Welcome to the projects section, here you can turn your ideas into reality and organize
        your goals, add your own projects easily.
        <br>Explore new possibilities to develop yourself and enhance your skills, follow your progress.
        <br>Start now and make your ambitions come true through our platform.
    </p>
    <a class="float-right m-2 mt-5 btn btn-primary section" href="projects/add/" role="button">Add</a><br>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Title</th>
                <th scope="col">Project Title</th>
                <th scope="col">Priority</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->category_title }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->priority == 1 ? 'Highest' : ($project->priority == 2 ? 'High': ($project->priority == 3 ? 'Medium' : ($project->priority == 4 ? 'Low' : 'Lowest'))) }}
                </td>
                <td class="tdth">
                    <a href="/projects/edit/{{ $project->id }}" class="btn btn-secondary">Edit</a>
                    &nbsp; &nbsp;
                    <a href="/projects/delete/{{ $project->id }}" class="btn btn-secondary"
                        onclick="return confirmDelete('{{ $project->id }}', '{{ $project->title }}');">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
    function confirmDelete(id, title) {
        let text = "Are you sure you want to delete this project (" + title + ")";
        if (confirm(text) == true) {
            window.location.href = "/projects/delete/" + id;
        }
    }
    </script>
</div>
@endsection