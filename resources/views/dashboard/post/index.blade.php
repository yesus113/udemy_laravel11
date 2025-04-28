@extends('dashboard.master')

@section ('content')
    <h1 class="h1">
        Post
    </h1>
        <a class="btn btn-primary my-3" href="{{route('post.create')}}" target="blank">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Title
                </th>
                <th>
                    Slug
                </th>
                <th>
                    Content
                </th>
                <th>
                    Posted
                </th>
                <th>
                    Category
                </th>
                <th>
                    Options
                </th>
            </tr>
        </thead>
        <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td>
                            {{$p->id}}
                        </td>
                        <td>
                            {{$p->title}}
                        </td>
                        <td>
                            {{$p->slug}}
                        </td>
                        <td>
                            {{$p->content}}
                        </td>
                        <td>
                            {{$p->posted}}
                        </td>
                        <td>
                            {{$p->category->title}}
                        </td>
                        <td>
                            <a class="btn btn-success mt-3" href="{{route('post.edit', $p)}}">Edit</a>
                            <a class="btn btn-warning mt-3" href="{{route('post.show', $p)}}">Show</a>
                            <form action="{{ route('post.destroy', $p)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger mt-3" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    <div class="mt-3">

    </div>
    {{$posts->links() }}

@endsection
