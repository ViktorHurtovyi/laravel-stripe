@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('create.order', $product)}}">
            <div class="row">
                @csrf
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
                    <div class="form-group">
                        <label for="card_no">Card Number</label>
                        <input required name="card_no" type="number" class="form-control" id="card_no"
                               placeholder="Number">
                    </div>
                    <div class="row">
                    <span class="form-group col-4">
                        <label for="ccExpiryMonth">Month</label>
                        <input max="12" min="1" required name="ccExpiryMonth" type="number" class="form-control" id="ccExpiryMonth"
                               placeholder="Month">
                    </span>
                        <span class="form-group col-4">
                        <label for="ccExpiryYear">Year</label>
                        <input max="2100" min="2020" required name="ccExpiryYear" type="number" class="form-control" id="ccExpiryYear"
                               placeholder="Year">
                    </span>
                        <span class="form-group col-4">
                        <label for="cvvNumber">CVV</label>
                        <input max="999" min="100" required name="cvvNumber" type="number" class="form-control" id="cvvNumber"
                               placeholder="CVV">
                    </span>
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
