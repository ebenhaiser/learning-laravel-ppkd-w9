@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>{{ $title ?? '' }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">Customer Name</label>
                    <input type="text" class="form-control" placeholder="Insert customer name" name="customer_name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" placeholder="Insert phone number" name="phone">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" placeholder="Insert address" name="address">
                </div>
                <button class="btn btn-primary shadow">Submit</button>
            </form>
        </div>
    </div>
@endsection
