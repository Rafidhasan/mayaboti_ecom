@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            @guest
                @include('auth.register')
            @endguest

            @auth
                @include('products.index')
            @endauth
        </div>
    </div>
</div>
@endsection
