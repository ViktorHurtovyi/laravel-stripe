@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Brand</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <th scope="row">{{$product->brandName}}</th>
                    <th scope="row">{{$product->name}}</th>
                    <th scope="row">{{$product->price}}</th>
                    <td><a href="{{route('product.checkout', $product)}}">Buy</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
      <div class="offset-5 col-2">{{ $products->links() }}</div>
    </div>
@endsection
