@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>{{ $title ?? '' }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('trans_order.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Order Code</label>
                            <input type="text" class="form-control" name="order_code" value="{{ $order_code }}"
                                readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Laundry Date</label>
                            <input type="date" class="form-control" name="order_date">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Customer Name</label>
                            <select name="id_customer" id="" class="form-control">
                                <option value="">-- customers --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Pickup Date</label>
                            <input type="date" class="form-control" name="order_end">
                        </div>
                    </div>
                </div>
                <hr>
                <div align="right" class="mb-3">
                    <button class="btn btn-secondary add-row" type="button">
                        <i class="bx bx-plus"></i>
                    </button>
                </div>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-parent">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary shadow">Submit</button>
            </form>
        </div>
    </div>
@endsection
