@extends('layout')
@section('title', 'Activites')


@section('content')
<div class="mt-5 section">
    <p class="text-justify">Welcome to Activities section! Here you can easily track and organize your daily activites
        to achieve your goals more effectively.<br>
        Complete your tasks add just your plan and clebrate your progress every day.
    </p>
    <a class="float-right m-2 mt-5 btn btn-primary section" href="activities/add" role="button">Add</a><br>


    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Category Title</th> <!-- عرض اسم الفئة -->
                <th>Project Title</th> <!-- عرض اسم المشروع -->
                <th>Activity Title</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
            <tr>
                <th scope="row">{{ $activity->id }}</th>
                <td>{{ $activity->category_title }}</td> <!-- اسم الفئة -->
                <td>{{ $activity->project_title }}</td> <!-- اسم المشروع -->
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->duration ?? 'غير محددة' }}</td>
                <td class="tdth">
                    <a href="/activities/edit/{{ $activity->id }}" class="btn btn-secondary">Edit</a>
                    &nbsp;&nbsp;
                    <a href="/activities/delete/{{ $activity->id }}" class="btn btn-secondary"
                        onclick="confirmDelete('{{ $activity->id }}', '{{ $activity->title }}');">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <script>
        function confirmDelete(id, title) {
        let text = "Are you sure you want to delete this activity (" + title + ")?";
        if (confirm(text) == true) {
            window.location.href = "/activities/delete/" + id;
        }
    }
    </script>

</div>
@endsection