@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>{{ $title ?? '' }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('service.update', $service->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label">Service Name</label>
                    <input type="text" class="form-control" placeholder="Insert service name" name="service_name"
                        value="{{ $service->service_name ?? '' }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="Insert price" name="price"
                        value="{{ $service->price ?? '' }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" placeholder="Insert description" name="description"
                        value="{{ $service->description ?? '' }}">
                </div>
                <button class="btn btn-primary shadow">Submit</button>
            </form>
        </div>
    </div>
@endsection
