@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('create.order')}}">
            <div class="row">
                @csrf
                <input name="product_id" type="hidden" value="{{$product->id}}">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required name="name" type="text" class="form-control" id="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input required name="address" type="text" class="form-control" id="address"
                               placeholder="address">
                    </div>
                    <div class="form-group">
                        <select required name="shipping_option" class="form-group">
                            <option value="standard">Free standard</option>
                            <option value="express">Express 10 EUR</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
