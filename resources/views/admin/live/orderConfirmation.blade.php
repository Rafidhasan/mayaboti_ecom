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
            <form method="post" enctype="multipart/form-data" action="/order_confirm/{{$products_user[0]->id}}">
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
            <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                <div class="card">
                    <div class="card-header p-4">
                        <img src="{{ asset('img/logo.png') }}" height="45px" width="40px" alt="">
                        <div class="float-right">
                            <h3 class="mb-0">Invoice #BBB10234</h3>
                            Date: 12 Jun,2019
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h5 class="mb-3">From:</h5>
                                <h3 class="text-dark mb-1">Tejinder Singh</h3>
                                <div>29, Singla Street</div>
                                <div>Sikeston,New Delhi 110034</div>
                                <div>Email: contact@bbbootstrap.com</div>
                                <div>Phone: +91 9897 989 989</div>
                            </div>
                            <div class="col-sm-6 ">
                                <h5 class="mb-3">To:</h5>
                                <h3 class="text-dark mb-1">Akshay Singh</h3>
                                <div>478, Nai Sadak</div>
                                <div>Chandni chowk, New delhi, 110006</div>
                                <div>Email: info@tikon.com</div>
                                <div>Phone: +91 9895 398 009</div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th class="right">Price</th>
                                        <th class="center">Qty</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center">1</td>
                                        <td class="left strong">Iphone 10X</td>
                                        <td class="left">Iphone 10X with headphone</td>
                                        <td class="right">$1500</td>
                                        <td class="center">10</td>
                                        <td class="right">$15,000</td>
                                    </tr>
                                    <tr>
                                        <td class="center">2</td>
                                        <td class="left">Iphone 8X</td>
                                        <td class="left">Iphone 8X with extended warranty</td>
                                        <td class="right">$1200</td>
                                        <td class="center">10</td>
                                        <td class="right">$12,000</td>
                                    </tr>
                                    <tr>
                                        <td class="center">3</td>
                                        <td class="left">Samsung 4C</td>
                                        <td class="left">Samsung 4C with extended warranty</td>
                                        <td class="right">$800</td>
                                        <td class="center">10</td>
                                        <td class="right">$8000</td>
                                    </tr>
                                    <tr>
                                        <td class="center">4</td>
                                        <td class="left">Google Pixel</td>
                                        <td class="left">Google prime with Amazon prime membership</td>
                                        <td class="right">$500</td>
                                        <td class="center">10</td>
                                        <td class="right">$5000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">Subtotal</strong>
                                            </td>
                                            <td class="right">$28,809,00</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">Discount (20%)</strong>
                                            </td>
                                            <td class="right">$5,761,00</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">VAT (10%)</strong>
                                            </td>
                                            <td class="right">$2,304,00</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">Total</strong> </td>
                                            <td class="right">
                                                <strong class="text-dark">$20,744,00</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
