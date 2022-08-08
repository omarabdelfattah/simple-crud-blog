@extends('layouts.app')


@section('page_title', 'Users')

@section('content')
        <table class="table table-striped text-center">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user["id"]}}</th>
                <td><a href="{{ Route('users.show',['id'=>$user['id'] ]) }}">{{ $user["name"] }}</a></td>
                <td>{{ $user["email"] }}</td>
                <td>
                    <div class="row text-center">
                        <div class="col-md-6 "><a href="{{ Route('users.edit',['id'=>$user['id'] ]) }}" class="btn btn-primary">Edit</a></div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ Route('users.destroy',['id'=>$user['id'] ]) }}">
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
        
                    {!! $users->links('pagination::bootstrap-4') !!}
              
        </div>
        

@endsection