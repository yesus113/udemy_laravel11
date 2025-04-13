@extends('dashboard.master')

@section('header')
    INDEX
@endsection

@section ('content')
    <a href="{{route('post.create')}}" target="blank">Create</a>
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Title
                </td>
                <td>
                    Slug
                </td>
                <td>
                    Content
                </td>
                <td>
                    Posted
                </td>
                <td>
                    Category
                </td>
                <td>
                    Options
                </td>
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
                            <a href="{{route('post.edit', $p)}}">Edit</a>
                            <a href="{{route('post.show', $p)}}">Show</a>
                            <form action="{{route('post.destroy', $p)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>

    {{$posts->links() }}

@endsection
