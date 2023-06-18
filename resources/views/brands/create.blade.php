@extends('layout')
@section('content')
    <div class="container-fluid">

<h6 class="mx-5">create brand </h6>
<form class="mx-5" method="POST" enctype="multipart/form-data" action="{{route('brands.store')}}">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror"
             name="name" placeholder="Enter name" id="name" value="{{old('name')}}">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*"
               name="image" id="image" value="{{old('image')}}">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
@endsection
