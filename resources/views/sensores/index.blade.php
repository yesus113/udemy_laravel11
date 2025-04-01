@extends('dashboard.master')

@section('header')
    INDEX
@endsection

@section ('content')
    <table>
        <thead>
            <tr>
                Title
            </tr>
            <tr>
                Posted
            </tr>
            <tr>
                Category
            </tr>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td>
                            {{$p->title}}
                        </td>
                        <td>
                            {{$p->posted}}
                        </td>
                        <td>
                            {{$p->category->title}}
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </thead>
    </table>

    {{$posts->links() }}
   
@endsection