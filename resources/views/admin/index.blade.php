@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">Admin Panel</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="/admin">Create Live</a></li>
                        <li><a href="/lives">Live List</a></li>
                        <li><a href="/orders">Orders</a></li>
                        <li><a href="/">Add Employee</a></li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <h3>Type a new Live name and press start</h3>
                    <form method="post" action="/live_start">
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
