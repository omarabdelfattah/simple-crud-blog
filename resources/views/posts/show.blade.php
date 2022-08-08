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

  </tbody>
</table>

@endsection