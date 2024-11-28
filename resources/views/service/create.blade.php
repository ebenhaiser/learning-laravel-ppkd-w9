@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>{{ $title ?? '' }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('service.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">Service Name</label>
                    <input type="text" class="form-control" placeholder="Insert service name" name="service_name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="Insert price" name="price">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" placeholder="Insert description" name="description">
                </div>
                <button class="btn btn-primary shadow">Submit</button>
            </form>
        </div>
    </div>
@endsection
