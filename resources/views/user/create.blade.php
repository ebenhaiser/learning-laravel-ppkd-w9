@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>User Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Insert name" name="name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Insert name" name="email">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Insert password" name="password">
                </div>
                <button class="btn btn-primary shadow">Submit</button>
            </form>
        </div>
    </div>
@endsection
