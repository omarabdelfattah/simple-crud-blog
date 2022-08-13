@extends('layouts.default')


@section('page_title', 'show user'.$user['name'])

@section('content')

<table class="table">
  <tbody>
    <tr>
        <td>Name</td>
        <td>{{$user['name']}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$user['email']}}</td>
    </tr>

  </tbody>
</table>

<div class="container">
  <div class="row">
    @foreach($user->posts as $post)
    <div class="card col-md-4" style="">
      <div class="card-body">
        <h5 class="card-title">{{$post['title']}}</h5>
        <a href="{{ Route('posts.show',['id' => $post['id']]) }}" class="btn btn-primary">Show</a>
      </div>
    </div>
    @endforeach
  </div>
</div>

  


@endsection