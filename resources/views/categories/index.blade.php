@extends('layout')
@section('content')
    <div class="container-fluid">

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
                <td>{{$category->status}}</td>
                <td>{{$category->action}}</td>
                <td>
                    <a href="{{route('categories.edit',$category)}}" class="btn btn-outline-primary">Edit</a>
                    <form method="post" action="{{route('categories.destroy',$category)}}"
                    class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm font-1 mx-1"
                        onclick="var result = confirm('Are you sure you want to delete');
                        if (result){}else{event.preventDefault()}">
                            <span class="fa fa-trash"></span> Delete
                        </button>

                    </form>
                </td>
            </tr>
        @endforeach
        @empty($category)
            <h3>There is not any data</h3>
        @endempty
    </tbody>
  </table>
        {!! $categories->render() !!}
    </div>
@endsection
