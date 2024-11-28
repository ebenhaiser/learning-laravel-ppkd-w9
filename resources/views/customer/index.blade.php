@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>{{ $title ?? '' }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('customer.create') }}" class="btn btn-primary shadow">
                    <i class='bx bx-plus'></i>
                </a>
            </div>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $key => $val)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->customer_name }}</td>
                            <td>{{ $val->phone }}</td>
                            <td>{{ $val->address }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('customer.edit', $val->id) }}" class="btn btn-icon btn-secondary">
                                    <i class="tf-icon bx bx-pencil bx-22px"></i>
                                </a>
                                {{-- <a href="" class="btn btn-icon btn-danger">
                                    <i class="tf-icon bx bx-trash bx-22px"></i>
                                </a> --}}
                                <form action="{{ route('customer.destroy', $val->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-icon btn-danger">
                                        <i class="tf-icon bx bx-trash bx-22px"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
