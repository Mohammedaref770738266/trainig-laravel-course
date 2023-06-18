@extends('layout')
@section('content')
    <div class="container-fluid">

<a href="{{route('brands.create')}}" class="btn btn-primary mb-5 float-right">Create</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{$brand->name}}</td>
                <td>
                    <img width="100" src="{{url('storage/'.$brand->image)}}">
                </td>
                <td>
                    <a href="{{route('brands.edit',$brand)}}" class="btn btn-outline-primary">Edit</a>
                    <form method="post" action="{{route('brands.destroy',$brand)}}"
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
        @empty($brand)
            <h3>There is not any data</h3>
        @endempty
    </tbody>
  </table>
        {!! $brands->render() !!}
    </div>
@endsection
