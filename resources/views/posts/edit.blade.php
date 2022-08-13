@extends('layouts.default')


@section('page_title', 'Edit post'.$post['name'])

@section('content')

@if($errors->any())
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-2">
            <div class="alert alert-danger">
                <p><strong>Fix these errors</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endif
@if(session()->has('success'))
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-2">
            <div class="alert alert-success">
                <p><strong>{{ session()->get('success') }}</strong></p>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <form method="POST" action="{{ ROUTE('posts.update',['id' => $id] ) }}" class="mt-5 col-md-4 mx-auto"  enctype="multipart/form-data">
    @CSRF
    @method('PUT')
    @if(isset($post['image']))
        <div class="row">
        <div class="col-md-6 mx-auto mt-2">
            <img src="{{ asset('storage/'.$post['image']) }}" alt="{{$post['title']}}" class="img-fluid">
        </div>
    @endif

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
        <label for="image" class="col-sm-2 col-form-label">image</label>
        <div class="col-sm-10">
        <input type="file" id="image"  name="image"  >
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>



@endsection