@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    Confirm Order
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary btn-lg" href="{{ url()->previous() }}"  style="float:right">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="/order_confirm/{{$products_user[0]->user_id}}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="name" value="{{$products_user[0]->name}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone number">Phone Number</label>
                    <input type="text" class="form-control" name="number" value="{{$products_user[0]->phone_number}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" value="{{$products_user[0]->address}}">
                </div>
                @foreach ($products_user as $product)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/images/'.trim($product->image, '"')) }}" height="100px" width="100px" alt="">
                            </div>
                            <div class="col-md-4">
                                <label for="address">Price</label>
                                <input type="text" class="form-control" name="price[]" multiple placeholder="write price">
                            </div>
                            <div class="col-md-4">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" name="quantity[]" multiple value="{{$product->quantity}}">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="form-row">
                  <label for="discount">Discount</label>
                  <input type="text" class="form-control" name="discount" placeholder="add discount">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Confirm</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
