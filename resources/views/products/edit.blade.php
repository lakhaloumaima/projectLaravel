@extends('products.layout')

@section('content')

<div class="container" style="padding-top: 12%">
    <div class="card">
        <div class="card-body">        
            <p class="card-text"> <span> <a href="{{route ('products.index') }}" > Back </a> </span> Product Name : {{$product -> name }} </p>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 2%"> 
    <form  action="{{route ('products.update' , $product->id ) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name </label>
            <input type="text" name="name" class="form-control" value="{{$product -> name }}" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price </label>
            <input type="text" name="price" class="form-control" value="{{$product -> price }}" placeholder="Product Price">
        </div>
        <div class="form-group">
            <label for="w3review">Detail </label>
            <textarea  name="detail" class="form-control" rows="4" placeholder="Product Detail">
                {!! $product -> detail !!}
            </textarea> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update </button>
        </div>
        
  </form>
</div>
@endsection