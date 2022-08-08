@extends('layouts.app')


@section('page_title', 'deleted posts')

@section('content')
        <table class="table table-striped text-center">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">enabled</th>
            <th scope="col">published at</th>
            <th scope="col">deleted at</th>
            <th scope="col">user</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
            <th scope="row">{{$post["id"]}}</th>
            <td><a href="{{ Route('posts.show',['id'=>$post['id'] ]) }}">{{ $post["title"] }}</a></td>
            <th scope="row">{{ $post["enabled"] ? "yes" : "No"}}</th>
            <th scope="row">{{ $post["published_at"] }}</th>
            <th scope="row">{{ $post["deleted_at"] }}</th>
            <th scope="row">{{ $post["user_id"]}}</th>
            <td>
                <div class="row text-center">
                    <div class="col-md-6">
                        <form method="POST" action="{{ Route('posts.restore',['id'=>$post['id'] ]) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">restore</button>
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