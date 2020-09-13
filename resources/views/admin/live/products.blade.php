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
                    Products under <strong>{{ $live_name->name }}</strong>
                </div>
                <div class="col-md-4">
                    <form action="/search" method="get" class="form-inline">
                        @csrf
                        <div class="form-group mx-sm-3">
                            <input type="text" class="form-control" name="query" placeholder="search">
                          </div>
                          <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </form>
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
                    @foreach ($products_user as $product)
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
                                    <div class="col-md-6">
                                        <a href="/order_confirm/{{ $product->id }}" class="btn btn-primary btn-sm">Confirm</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="confirmDeleteModal">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
