@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>{{ $title ?? '' }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('trans_order.create') }}" class="btn btn-primary shadow">
                    <i class='bx bx-plus'></i>
                </a>
            </div>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Order Code</th>
                        <th>Laundry Date</th>
                        <th>Pickup Date</th>
                        <th>Date Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $val)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->customer->customer_name }}</td>
                            <td>{{ $val->order_code }}</td>
                            <td>{{ $val->order_date }}</td>
                            <td>{{ $val->order_end }}</td>
                            @switch($val->order_status)
                                @case(0)
                                    {{ $order_status = 'New' }}
                                @break

                                @case(1)
                                    {{ $order_status = 'Done' }}
                                @break

                                @default
                            @endswitch
                            <td>{{ $order_status }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('trans_order.show', $val->id) }}" class="btn btn-icon btn-secondary">
                                    <i class="tf-icon bx bx-show bx-22px"></i>
                                </a>
                                {{-- <a href="" class="btn btn-icon btn-danger">
                                    <i class="tf-icon bx bx-trash bx-22px"></i>
                                </a> --}}
                                <form action="{{ route('trans_order.destroy', $val->id) }}" method="POST">
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
