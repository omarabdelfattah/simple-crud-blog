@extends('layouts.app')


@section('page_title', 'Edit post'.$post['name'])

@section('content')
<div class="row">
    <form method="POST" action="{{ ROUTE('posts.update',['id' => $id] ) }}" class="mt-5 col-md-4 mx-auto" >
    @CSRF
    @method('PUT')
    <div class="form-group row ">
        <label for="title" class="col-sm-2 col-form-label">title</label>
        <div class="col-sm-10">
        <input type="text"  class="form-control" id="title" name="title" value="{{$post['title']}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="body" class="col-sm-2 col-form-label">body</label>
        <div class="col-sm-10">
        <textarea name="body" id="" cols="30" rows="10">{{$post['body']}}</textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="enabled" class="col-sm-2 col-form-label">enabled</label>
        <div class="col-sm-10">
        <input type="checkbox"  class="form-control" id="enabled"  name="enabled" {{$post['enabled'] ? "checked" : " "}}  >
        </div>
    </div>

    <div class="form-group row">
        <label for="user_id" class="col-sm-2 col-form-label">user</label>
        <div class="col-sm-10">
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{$post['user_id'] ? "selected" : " "}}  >{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

@endsection