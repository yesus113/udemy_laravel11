@extends('dashboard.master')

@section('content')
    <h1 class="h1">
        Category
    </h1>
    <a class="btn btn-primary my-3" href="{{ route('category.create') }}" target="blank">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Title
                </th>
                <th>
                    Options
                </th>
            </tr>

        </thead>
        <tbody>
            @foreach ($category as $c)
                <tr>
                    <td>
                        {{ $c->id }}
                    </td>
                    <td>
                        {{ $c->title }}
                    </td>
                    <td>
                        <a class="btn btn-success mt-3" href="{{ route('category.show',$c) }}">Show</a>
                        <a class="btn btn-warning mt-3" href="{{ route('category.edit',$c) }}">Edit</a>
                        <form action="{{ route('category.destroy', $c) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger mt-3" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $category->links() }}

@endsection
