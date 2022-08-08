@extends('layouts.app')


@section('page_title', 'add user')

@section('content')
<div class="row">
    <form method="POST" action="{{ ROUTE('users.store') }}" class="mt-5 col-md-4 mx-auto" >
    @CSRF
    <div class="form-group row ">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="text"  class="form-control" id="name" name="name" value="">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text"  class="form-control" id="email"  name="email"  value="">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">password</label>
        <div class="col-sm-10">
        <input type="password"  class="form-control" id="password"  name="password"  >
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

@endsection