@extends('layout')
@section('content')
    <div class="container-fluid">

<a href="{{route('products.create')}}" class="btn btn-primary mb-5 float-right">Create</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img width="50" src="{{url('storage/'.$product->image)}}">
                </td>
                <td>
                    <div class="">
                        @foreach($product->categories as $category)
                            <span >{{$category->name}} </span>
                        @endforeach
                    </div>
                </td>
                <td>{{$product->brand->name}}</td>
                <td>{{$product->status}}</td>
                <td>
                    <a href="{{route('products.edit',$product)}}" class="btn btn-outline-primary">Edit</a>
                    <form method="post" action="{{route('products.destroy',$product)}}"
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
        @empty($product)
            <h3>There is not any data</h3>
        @endempty
    </tbody>
  </table>
        {!! $products->render() !!}
    </div>
@endsection
