@extends('layouts.app')


@section('page_title', 'show post'.$post['title'])

@section('content')

<table class="table">
  <tbody>
    <tr>
        <td>title</td>
        <td>{{$post['title']}}</td>
    </tr>
    <tr>
        <td>body</td>
        <td>{{$post['body']}}</td>
    </tr>
    <tr>
        <td>published at</td>
        <td>{{$post['published_at']}}</td>
    </tr>

    <tr>
        <td>enabled</td>
        <td>{{$post['enabled'] ? "yes" : "No" }}</td>
    </tr>

    <tr>
        <td>user</td>
        <td> <a href="{{ Route('users.show',['id' => $post->user->id ]) }}">{{$post->user->name }}</a> </td>
    </tr>

    
  </tbody>
</table>


@endsection