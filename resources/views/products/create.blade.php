@extends('products.layout')

@section('content')

<div class="container" style="padding-top: 12%">
    <div class="card">
        <div class="card-body">
            <p class="card-text"> <span> <a href="{{route ('products.index') }}" > Back </a> </span></p>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 2%"> 
    <form  action="{{route ('products.store') }}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name </label>
            <input type="text" name="name" class="form-control" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price </label>
            <input type="text" name="price" class="form-control" placeholder="Product Price">
        </div>
        <div class="form-group">
            <label for="w3review">Detail </label>
            <textarea  name="detail" class="form-control" rows="4" placeholder="Product Description">
                
            </textarea> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
  </form>
</div>
@endsection