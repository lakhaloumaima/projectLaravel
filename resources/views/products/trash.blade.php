@extends('products.layout')

@section('content')
    <div class="jumbotron container"> 
      <h1> Trashed Products : 
        <span> 
          <a class="btn btn-primary btn-lg" href="{{route ('product.index')}}" role="button">Products </a> <br>
         </span>
      </h1>
    </div>
    <div class="container" >
      @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{$message}}
        </div>
      @endif
    </div>

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                
                <th scope="col" style="width: 400px">Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 0 ;

              @endphp
                @foreach ($products as $item)
                <tr>
                    <th scope="row">{{++$i}} </th>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> price}} DT</td>
                    <td>
                      <div class="container">
                        <div class="row">
                          
                          <div class="col-sm">
                            <a class="btn btn-success" href="{{route ('product.back.from.trash' , $item->id )}}">Restore </a>
                          </div>
                          <div class="col-sm">
                            <a class="btn btn-danger" href="{{route ('product.delete.from.database' , $item->id )}}">Delete</a>
                          </div>
                         
                        </div>
                      </div>
                       
                       
                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
          {!! $products->links() !!}
    </div>    
  </div>
@endsection