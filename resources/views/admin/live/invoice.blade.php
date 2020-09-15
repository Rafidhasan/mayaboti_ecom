@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice of {{ $user[0]->name }}
            </div>
            <div class="card-body">
                <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                    <div class="card">
                        <div class="card-header p-4">
                            <img src="{{ asset('img/logo.png') }}" height="45px" width="40px" alt="">
                            <div class="float-right">
                                <h3 class="mb-0">Invoice #{{ $serial }}</h3>
                                {{ $created_at }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h5 class="mb-3">From:</h5>
                                    <h3 class="text-dark mb-1">Mayaboti</h3>
                                    <div>29, Singla Street</div>
                                    <div>Sikeston,New Delhi 110034</div>
                                    <div>Email: contact@bbbootstrap.com</div>
                                    <div>Phone: +91 9897 989 989</div>
                                </div>
                                <div class="col-sm-6 ">
                                    <h5 class="mb-3">To:</h5>
                                    <h3 class="text-dark mb-1">{{ $user[0]->name }}</h3>
                                    <div>{{ $user[0]->address }}</div>
                                    <div>{{ $user[0]->email }}</div>
                                    <div>{{ $user[0]->phone_number }}</div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">Item</th>
                                            <th class="right">Price</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice_products as $key => $product)
                                        <tr>
                                            <td class="center">Item - {{ $key + 1 }}</td>
                                            <td class="right">{{ $product->price }}</td>
                                            <td class="center">{{ $product->quantity }}</td>
                                            <td class="right">{{ $product->total }}</td>
                                        </tr>
                                        @endforeach
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
                                                            <td class="right">{{ $subtotal }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <p class="mb-0">mayaboti.com </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
