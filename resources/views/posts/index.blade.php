@extends('layouts.app')


@section('page_title', 'Posts')

@section('content')
        <table class="table table-striped text-center">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">enabled</th>
            <th scope="col">published at</th>
            <th scope="col">user</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
            <th scope="row">{{$post["id"]}}</th>
            <td><a href="{{ Route('posts.show',['id'=>$post['id'] ]) }}">{{ $post["title"] }}</a></td>
            <th scope="row">{{$post["enabled"] ? "yes" : "No"}}</th>
            <th scope="row">{{ $post["published_at"] }}</th>
            <th scope="row">{{$post["user_id"]}}</th>
            <td>
                <div class="row text-center">
                    <div class="col-md-6 "><a href="{{ Route('posts.edit',['id'=>$post['id'] ]) }}" class="btn btn-primary">Edit</a></div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ Route('posts.destroy',['id'=>$post['id'] ]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <div class="container text-center">
        
                    {!! $posts->links('pagination::bootstrap-4') !!}
              
        </div>
        

@endsection