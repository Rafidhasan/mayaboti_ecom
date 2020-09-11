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
                    @include('partials._admin_menu')
                </div>
                <div class="col-md-8">
                    <h3>List of Lives</h3>
                    <ul>
                        @foreach ($lives as $live)
                            <li><a href="/lives/{{ $live->id }}">{{ $live->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
