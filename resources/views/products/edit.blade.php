@extends('layout')
@section('content')
    <div class="container-fluid">

        <h6 class="mx-5">create product </h6>
        <form class="mx-5" method="POST" action="{{route('products.update',$product)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="{{@old('name',$product)}}"
                @error('name')  is-invalid @enderror name="name" placeholder="Enter name" id="name">
            </div>
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description">{{old('description',$product)}}</textarea>
            </div>
            <div class="">
                <input type="radio" checked class="" id="customRadio" name="type"
                       @checked(old('type',$product)=='New' || old('type')==Null) value="new">
                <label class=" mr-5" for="customRadio">New</label>

                <input type="radio" class="" id="customRadio2" name="type"
                       @checked(old('type',$product) == "old") value="old">
                <label class="" for="customRadio">Old</label>
            </div>

            <div class="form-group form-check">
                <label class="form-check-label">
                    <input name="status" class="form-check-input" @checked(old('status',$product)) type="checkbox"> Status
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
