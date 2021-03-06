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
                <div class="col-md-4">
                    Search List with <strong>{{ $keyword }}</strong>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <a href="/lives" style="float: right" class="btn btn-primary btn-lg">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Phone Number</th>
                        <th>Facebook URL</th>
                        <th>Product Image</th>
                        <th>Product Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->phone_number}}</td>
                            <td>{{$product->url}}</td>
                            <td>
                                <img src="{{ asset('storage/images/'.trim($product->image, '"')) }}" height="100px" width="100px" alt="">
                            </td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6"><a href="/order_confirm/{{ $product->user_id }}/{{ $product->id }}" class="btn btn-primary btn-sm">Confirm</a></div>
                                    <div class="col-md-6"><a href="/delete/{{ $product->user_id }}/{{ $product->id }}" class="btn btn-danger btn-sm">Delete</a></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
