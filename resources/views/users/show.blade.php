@extends('layouts.app')


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

@endsection