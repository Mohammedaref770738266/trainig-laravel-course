@extends('layout')
@section('content')
<a href="{{route('categories.create')}}" class="btn btn-primary mb-5 float-right">Create</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Type</th>
        <th>Status</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->type}}</td>
                <td>{{$category->action}}</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>  
        @endforeach
      
    </tbody>
  </table>
@endsection