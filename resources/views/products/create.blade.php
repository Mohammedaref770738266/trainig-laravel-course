@extends('layout')
@section('content')
    <div class="container-fluid">

<h6 class="mx-5">create product </h6>
<form class="mx-5" method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror"
             value="{{old('name')}}" name="name" placeholder="Enter name" id="name">
    </div>
    @error('name')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror



    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
    </div>


    <div class="form-group">
        <label for="brand_id">Brands</label>
        <select class="form-control select2" name="brand_id" id="brand_id">
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}" @selected(old('brand_id')==$brand->id)>{{$brand->name}}</option>
            @endforeach
        </select>

        @error('brand_id')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="brand_id">Categories</label>
        <select class="form-control select2 @error('brand_id') is-invalid @enderror" multiple name="categories[]" id="categories">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Price:</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror"
               value="{{old('price')}}" name="price" placeholder="Enter price" id="price">
    </div>
    @error('price')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror



    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*"
               name="image" id="image" value="{{old('image')}}">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>


    <div class="form-group form-check">
      <label class="form-check-label">
        <input name="status" class="form-check-input" @checked(old('status')) type="checkbox"> Status
      </label>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
@endsection
