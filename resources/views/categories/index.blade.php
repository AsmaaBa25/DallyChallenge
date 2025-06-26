@extends('layout')
@section('title', 'Categories')


@section('content')

<div class="mt-5 section">
    <p class="text-justify">The following pages enable you to
        Manage your categories easily, add, edit or remove categories in just a few simple steps.
        <br>Everything is designed to be easy to use.
        <br>Like taking care of your health and talents Add new skills have fun.
    </p>
    <a class="float-right m-2 mt-5 btn btn-primary section" href="/categories/add" role="button">Add</a><br>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</Title>
                </th>
                <th scope="col">Actiion</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td class="tdth"><a href="/categories/edit/{{ $category->id }}" class="btn btn-secondary "
                        role="button">Edit</a>
                    &nbsp; &nbsp;<button onclick="confirmDelete({{ $category->id }}, '{{ $category->title }}')"
                        class="btn btn-secondary " role="button">Delet</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete(id, title) {
                let text = "Are you sure you want to delete this category ("+title+")";
                if (confirm(text) == true) {
                    window.location.href = "/categories/delete/" + id;
                }
            }
    </script>

</div>

@endsection